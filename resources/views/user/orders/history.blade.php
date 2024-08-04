@extends($layout)
@section('content')

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="container mt-5 mb-5">
        <h1 class="mb-4">Riwayat Pemesanan</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor Order</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($orders->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">No Orders available.</td>
                        </tr>
                    @else
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td>
                                    @if ($order->status == 'disetujui')
                                        <a href="{{ route('payment.success', $order->id) }}"
                                            class="btn btn-success btn-sm">{{ ucfirst($order->status) }}</a>
                                    @elseif($order->status == 'terkirim')
                                        <form class="m-0" action="{{ route('orders.received', $order->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Konfirmasi Pesanan</button>
                                        </form>
                                    @elseif($order->status == 'diterima')
                                        <a href="{{ route('payment.success', $order->id) }}"
                                            class="btn btn-success btn-sm">{{ ucfirst($order->status) }}</a>
                                        @if (isset($reviews[$order->product->id]))
                                            <a href="{{ route('reviews.edit', $reviews[$order->product->id]->id) }}"
                                                class="btn btn-warning btn-sm">Edit Review</a>
                                        @else
                                            <a href="{{ route('payment.review', $order->id) }}"
                                                class="btn btn-warning btn-sm">Review</a>
                                        @endif
                                    @elseif ($order->status == 'pending')
                                        <a href="{{ route('payment.pending', $order->id) }}"
                                            class="btn btn-warning btn-sm">{{ ucfirst($order->status) }}</a>
                                    @else
                                        <a href="#"
                                            class="btn btn-secondary btn-sm">{{ ucfirst($order->status) }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
