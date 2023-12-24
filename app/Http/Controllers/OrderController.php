<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class OrderController extends Controller
{
    public function order($id_sub_cat = NULL){

        $subcategory = Subcategory::all();

        $subcatid = Subcategory::find($id_sub_cat);

        if($id_sub_cat != NULL){
            $items = Item::where('subcategory_id', $id_sub_cat)->get();
        } else {
            $items = Item::all();
        }

        return view('pages/ordermenu', compact('items','subcategory', 'subcatid'));
    }

    public function increaseQuantity($id){
        $items = Order::instance('order')->get($id);
        $qty = $items->qty + 1;
        Order::instance('order')->update($id, $qty);
    }

    public function decreaseQuantity($id){
        $items = Order::instance('order')->get($id);
        $qty = $items->qty - 1;
        Order::instance('order')->update($id, $qty);
    }

    public function cart()
    {
        $items = Item::all();
        return view('pages/cart', ['items' => $items,]);
    }

    public function paymentProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'total_order' => 'required',
            'total_amount' => 'required',
        ]);

         $orderNumber = 'ORD' . rand(1000, 9999);

        $order =  Order::create([
            'email' => $request->email,
            'name' => $request->name,
            'total_order' => $request->total_order,
            'total_amount' => $request->total_amount,
            'order_number' => $orderNumber,
        ]);

        $cartItems = $request->input('cartItems');

            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'item_id' => $item['item_id'],
                    'item_name' => $item['item_name'],
                    'item_price' => $item['item_price'],
                    'qty' => $item['qty'],
                    'order_id' =>$order->id
                ]);

                // Update stock in the items table
                $itemModel = Item::find($item['item_id']); // Replace Item with your actual model
                $itemModel->update([
                    'stock' => $itemModel->stock - $item['qty'],
                ]);
            }
            
            return redirect('/payment');
    }

    public function payment()
    {
        $items = Item::all();
        return view('pages/payment', ['items' => $items,]);
    }

    // public function qris($totalAmount)
    // {
    //     $totalAmount;
    //     return view('pages.qris', compact('totalAmount'));
    // }


    public function paymentSuccess()
    {
        return view('pages/payment-success');
    }

    // Untuk Halaman Admin

    public function orderMasuk()
    {
        $order = Order::orderBy('created_at', 'desc')->get();
        return view('admin/order-masuk/index', compact('order'));
    }

    public function editOrder($id)
    {
        $order = Order::whereId($id)->firstOrFail();
        $items = Item::all();
        $idOrder = $id; 

        $orderDetails = OrderDetail::select('order_detail.*', 'order.*', 'items.*','order_detail.id as order_detail_id')
            ->join('order', 'order_detail.order_id', '=', 'order.id')
            ->join('items', 'order_detail.item_id', '=', 'items.id')
            ->where('order.id', $id)
            ->get();

        return view('admin/order-masuk/edit', compact('orderDetails', 'order', 'items','idOrder'));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'item_id' => 'required',
            'qty' => 'required',
        ]);

        $item = Item::find($request->item_id);

        if (!$item) {
            abort(404, 'Order not found');
        }

        $data = [
            'order_id' => $request->order_id,
            'item_id' => $request->item_id,
            'item_name' => $item->name,
            'item_price' => $item->price,
            'qty' => $request->qty, 
        ];

        OrderDetail::create($data);

        // $orderdetail->order_id
        $order = Order::find($request->order_id);

        // memperbarui stok

        if($item){
            $item->stock = $item->stock - $request->qty;
            $item->save();
        }

        // memperbarui order
        if ($order) {
          
            $totalOrder = $order->total_order + ($item->price * $request->qty);

            $totalAmount = $totalOrder + ($totalOrder * 0.1);

            $order->total_order = $totalOrder;
            $order->total_amount = $totalAmount;
            $order->save();
        }

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Item berasil ditambah
            </div>
        ');

        return redirect('order-masuk/' . $request->order_id . '/edit');
    }

    public function updateOrder(string $id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'status_payment' => 'required',
        ]);

        $order = Order::find($id);

        if (!$order) {
            abort(404, 'Order not found');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'payment_method' => $request->payment_method,
            'status_payment' => $request->status_payment, 
        ];

        $order->update($data);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');

        return redirect('order-masuk/' . $id . '/edit');
    }

    public function updateOrderDetail(string $id, Request $request)
    {

        $request->validate([
            'qty' => 'required|numeric|min:0'
        ]);

        $orderdetail = OrderDetail::find($id);

        if (!$orderdetail) {
            abort(404, 'Detail pesanan tidak ditemukan');
        }

        $oldQty = $orderdetail->qty;

        $orderdetail->update(['qty' => $request->qty]);

        $qtyDifference = $request->qty - $oldQty;

        $item = Item::find($request->item_id);
   
        if ($item) {
            $item->stock -= $qtyDifference;
            $item->save();
        }

        // $orderdetail->order_id
        $order = Order::find($orderdetail->order_id);

        $details = OrderDetail::where('order_id', $order->id)->get();

        if ($order) {
          
            $totalOrder = $details->sum(function ($detail) {
            return $detail->item_price * $detail->qty;
            });

            $totalAmount = $totalOrder + ($totalOrder * 0.1);

            $order->total_order = $totalOrder;
            $order->total_amount = $totalAmount;
            $order->save();
        }

         return redirect('order-masuk/' . $orderdetail->order_id . '/edit');
    }


    public function deleteOrderDetail(string $id)
    {

        $orderdetail = OrderDetail::find($id);

        if (!$orderdetail) {
            abort(404, 'Detail pesanan tidak ditemukan');
        }

        $qtyToDelete = $orderdetail->qty;
      
        $item = Item::find($orderdetail->item_id);
        
         // $orderdetail->order_id

        $orderdetail->delete();

        if ($item) {
            $item->stock += $qtyToDelete;
            $item->save();
        }

        $order = Order::find($orderdetail->order_id);
       
        $details = OrderDetail::where('order_id', $order->id)->get();

        if ($order) {
          
            $totalOrder = $details->sum(function ($detail) {
            return $detail->item_price * $detail->qty;
            });

            $totalAmount = $totalOrder + ($totalOrder * 0.1);

            $order->total_order = $totalOrder;
            $order->total_amount = $totalAmount;
            $order->save();
        }

        return redirect('order-masuk/' . $orderdetail->order_id . '/edit');

    }

    public function deleteOrder(string $id, Request $request)
    {

        try {
            DB::beginTransaction();

            // Mendapatkan semua OrderDetail untuk order tertentu
            $orderDetails = OrderDetail::where('order_id', $id)->get();

            // Inisialisasi array untuk menyimpan total kuantitas yang akan dihapus berdasarkan item_id
            $qtyToDeletePerItem = [];

            // Mengumpulkan total kuantitas yang akan dihapus berdasarkan item_id
            foreach ($orderDetails as $detail) {
                if (!isset($qtyToDeletePerItem[$detail->item_id])) {
                    $qtyToDeletePerItem[$detail->item_id] = 0;
                }

                $qtyToDeletePerItem[$detail->item_id] += $detail->qty;
            }

            // Memperbarui stock untuk setiap item yang terkait
            foreach ($qtyToDeletePerItem as $itemId => $qtyToDelete) {
                $item = Item::find($itemId);

                if ($item) {
                    $item->stock += $qtyToDelete;
                    $item->save();
                }
            }

            // Hapus order details yang terkait dengan order
            OrderDetail::where('order_id', $id)->delete();

            // Hapus order
            Order::find($id)->delete();

            DB::commit();

             $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');

            return redirect('order-masuk');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect('order-masuk');
        }
            return redirect('order-masuk');

    }


    public function orderMasukDetail($id)
    {
       
        $order = Order::whereId($id)->firstOrFail();

        $orderDetails = OrderDetail::select('order_detail.*', 'order.*', 'items.*')
            ->join('order', 'order_detail.order_id', '=', 'order.id')
            ->join('items', 'order_detail.item_id', '=', 'items.id')
            ->where('order.id', $id)
            ->get();

        return view('admin/order-masuk/show', compact('orderDetails', 'order'));
    }
}


