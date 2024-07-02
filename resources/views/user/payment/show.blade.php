@extends($layout)
@section('content')
    <h1>Payment for Order #{{ $order->id }}</h1>
    <p>Product: {{ $order->product->product_name }}</p>
    <p>Total Price: {{ $order->total_price }}</p>

    <form id="payment-form">
        @csrf
        <button type="button" id="pay-button">Pay Now</button>
    </form>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    handlePaymentResult(result);
                },
                onPending: function(result) {
                    handlePaymentResult(result);
                },
                onError: function(result) {
                    alert("Payment failed!");
                },
                onClose: function() {
                    alert('You closed the popup without finishing the payment');
                }
            });
        });

        function handlePaymentResult(result) {
            $.ajax({
                url: "{{ route('payment.callback') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    order_id: result.order_id,
                    status_code: result.status_code,
                    transaction_status: result.transaction_status,
                    gross_amount: result.gross_amount,
                    payment_type: result.payment_type,
                    transaction_time: result.transaction_time,
                    fraud_status: result.fraud_status,
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert("Payment successful!");
                        window.location.href = "{{ route('payment.success', $order->id) }}";
                    } else {
                        alert("Payment failed!");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                    alert("An error occurred while processing payment: " + error);
                }
            });
        }
    </script>
@endsection
