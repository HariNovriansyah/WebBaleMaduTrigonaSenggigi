@extends($layout)

@section('content')
<div class="container">
    <h1>Manage Deliveries</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @if($order->status == 'approved')
                            <form action="{{ route('delivery.deliverOrder', $order->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Deliver Order</button>
                            </form>
                        @elseif($order->status == 'delivering')
                            <form action="{{ route('delivery.completeOrder', $order->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Mark as Delivered</button>
                            </form>
                        @else
                            Delivered
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
