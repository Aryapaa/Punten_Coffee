<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function index()
    {

        $jumlah_item = Item::count();
        $jumlah_category = Category::count();
        $jumlah_subcategory = Subcategory::count();
        $jumlah_order = Order::count();

        $order = Order::orderBy('created_at', 'desc')
        ->where('status_payment', 'unpaid')
        ->take(5)
        ->get();

        $order_stat = Order::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as total'))
        ->groupBy('month')
        ->get();

          $chartData = [];
        foreach ($order_stat as $or) {
            $chartData[] = [
                'month' => $or->month,
                'total' => $or->total,
            ];
        }

        return view('admin/dashboard', compact('jumlah_item', 'jumlah_category', 'jumlah_subcategory', 'jumlah_order', 'order','chartData'));
    }
}
