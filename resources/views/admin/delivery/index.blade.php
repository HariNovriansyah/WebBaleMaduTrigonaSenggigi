@extends($layout)

@section('content')
    <div class="container p-5 bg-white rounded-4">
        <h1>Manage Deliveries</h1>
        @if (session('success'))
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

                @if ($orders->isEmpty())
                    <p class="text-muted">No blogs available.</p>
                @else
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                @if ($order->status == 'disetujui')
                                    <form class="m-0" action="{{ route('delivery.packingOrder', $order->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        <button type="submit">Pengemasan</button>
                                    </form>
                                @elseif($order->status == 'dikemas')
                                    <form class="m-0" action="{{ route('delivery.deliverOrder', $order->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Kirim Pesanan</button>
                                    </form>
                                @elseif($order->status == 'dikirim')
                                    <form class="m-0" action="{{ route('delivery.completeOrder', $order->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Konfirmasi Pengiriman</button>
                                    </form>
                                @else
                                    Pesanan telah dikirimkan
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
