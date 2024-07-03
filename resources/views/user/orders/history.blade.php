@extends($layout)
@section('content')

<h1>Riwayat Pemesanan</h1>
    <table>
        <thead>
            <tr>
                <th>Nomor Order</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        @if ($order->status == 'approved')
                            <a href="{{ route('payment.success', $order->id) }}">{{ $order->status }}</a>
                        @else
                            <a href="{{ route('payment.pending', $order->id) }}">{{ $order->status }}</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
