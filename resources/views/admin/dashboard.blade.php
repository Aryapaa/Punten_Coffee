@extends('admin.template.app')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')


<div class="row mb-4">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0 ">Items</h5>
                        <span class="h2 font-weight-bold mb-0 ">{{ $jumlah_item }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools-kitchen-2"
                                width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3" />
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">

                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Category</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $jumlah_category }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category"
                                width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 4h6v6h-6z" />
                                <path d="M14 4h6v6h-6z" />
                                <path d="M4 14h6v6h-6z" />
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">

                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sub Cat</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $jumlah_subcategory }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-success text-white rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2"
                                width="38" height="38" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 4h6v6h-6z" />
                                <path d="M4 14h6v6h-6z" />
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /></svg>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">

                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-2">Order</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $jumlah_order }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow p-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-shopping-cart-filled" width="38" height="38"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M6 2a1 1 0 0 1 .993 .883l.007 .117v1.068l13.071 .935a1 1 0 0 1 .929 1.024l-.01 .114l-1 7a1 1 0 0 1 -.877 .853l-.113 .006h-12v2h10a3 3 0 1 1 -2.995 3.176l-.005 -.176l.005 -.176c.017 -.288 .074 -.564 .166 -.824h-5.342a3 3 0 1 1 -5.824 1.176l-.005 -.176l.005 -.176a3.002 3.002 0 0 1 1.995 -2.654v-12.17h-1a1 1 0 0 1 -.993 -.883l-.007 -.117a1 1 0 0 1 .883 -.993l.117 -.007h2zm0 16a1 1 0 1 0 0 2a1 1 0 0 0 0 -2zm11 0a1 1 0 1 0 0 2a1 1 0 0 0 0 -2z"
                                    stroke-width="0" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">

                </p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-semibold">Data Order Masuk Terbaru</h5>
                    <a href="/order-masuk" class="btn btn-dark m-1 btn-sm ">Lihat semua</a>
                </div>
                <div class="table-responsive">
                    @if(count($order) > 0)
                    <div class="table-responsive">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total Order</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order as $item)
                                <tr class="">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item->order_number }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>Rp. {{ $item->total_order }}</td>
                                    <td>Rp. {{ $item->total_amount }}</td>
                                    <td class="text-uppercase">{{ $item->payment_method }}</td>
                                    <td class="text-uppercase">{{ $item->status_payment }}</td>


                                    <td>
                                        <a href="/order-masuk/{{$item->id}}/detail" class="btn btn-info btn-sm mb-1"><i
                                                class="fas fa-eye"></i> Detail</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12">Tidak ada data order saat ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>Tidak ada data order saat ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row m-2 p-4">
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100 p-4">
            <h5 class="card-title fw-semibold mb-2">Data Penjualan Per Bulan</h5>
            <div class="" id="orderChart"></div>
        </div>
    </div>
</div>

  <script src="/asset/libs/apexcharts/dist/apexcharts.min.js"></script>
<script>

    var options = {
          series: [
          {
            name: "Order",
            data: {!! json_encode(array_column($chartData, 'total'), JSON_NUMERIC_CHECK) !!}
          },
        ],
          chart: {
          height: 350,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: '',
          align: 'left'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'],
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
          categories: {!! json_encode(array_column($chartData, 'month')) !!},
          title: {
            text: ''
          }
        },
        yaxis: {
          title: {
            text: ''
          },
           
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
        };

            var chart = new ApexCharts(document.querySelector("#orderChart"), options);
    chart.render();
</script>

@endsection
