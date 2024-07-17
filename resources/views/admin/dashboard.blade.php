@extends($layout)
@section('content')
    <div class="container bg-white shadow vh-100 rounded-4 p-5">
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 d-flex align-items-stretch bg-primary text-bg-dark">
                    <div class="card-body text-center">
                        <h5>Total Users</h5>
                        <h3 style="font-weight: 700;">{{ $totalUsers }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 d-flex align-items-stretch bg-info text-bg-dark">
                    <div class="card-body text-center">
                        <h5>New Users This Month</h5>
                        <h3 style="font-weight: 700;">{{ $totalNewUsers }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 d-flex align-items-stretch bg-success text-bg-dark">
                    <div class="card-body text-center">
                        <h5>Total Orders</h5>
                        <h3 style="font-weight: 700;">{{ $totalOrders }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow h-100 d-flex align-items-stretch bg-danger text-bg-dark">
                    <div class="card-body text-center">
                        <h5>Total Revenue</h5>
                        <h3 style="font-weight: 700;">Rp{{ number_format($totalRevenue, 2) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>Pending Orders</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>Rp{{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($pendingOrders->isEmpty())
                        <p class="text-center">No pending orders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
