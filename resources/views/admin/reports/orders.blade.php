@extends($layout)
@section('content')

<div class="container p-5 bg-white rounded-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orders Report</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.reports.orders.download') }}" class="button">Download PDF</a>

                    @if ($orders->isEmpty())
                        <p class="text-muted">No orders available.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead style="background-color: #f0a440;">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->product->product_name }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
