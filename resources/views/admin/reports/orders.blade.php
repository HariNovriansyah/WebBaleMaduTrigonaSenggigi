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
                        <a href="#" id="downloadPdfButton" class="button mb-4">Download</a>



                        @if ($orders->isEmpty())
                            <p class="text-muted">No orders available.</p>
                        @else
                            <!-- Input for filtering -->
                            <div class="mb-3">
                                <input type="text" id="orderFilter" class="form-control mb-2"
                                    placeholder="Filter orders...">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-secondary filter-status"
                                        data-status="">All</button>
                                    <button type="button" class="btn btn-warning filter-status"
                                        data-status="pending">Pending</button>
                                    <button type="button" class="btn btn-danger filter-status"
                                        data-status="reject">Reject</button>
                                    <button type="button" class="btn btn-success filter-status"
                                        data-status="approved">Approved</button>
                                    <button type="button" class="btn btn-secondary filter-status"
                                        data-status="delivering">Delivering</button>
                                    <button type="button" class="btn btn-secondary filter-status"
                                        data-status="delivered">Delivered</button>
                                    <button type="button" class="btn btn-success filter-status"
                                        data-status="received">Received</button>
                                </div>
                                <select id="filterMonth" class="form-select mt-2">
                                    <option value="">All Months</option>
                                    @foreach (range(1, 12) as $month)
                                        <option value="{{ $month }}">
                                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                    @endforeach
                                </select>
                                <select id="filterYear" class="form-select mt-2">
                                    @foreach (range(now()->year, now()->year - 10) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>

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
                                    <tbody id="orderTableBody">
                                        @foreach ($orders as $order)
                                            <tr data-status="{{ $order->status }}"
                                                data-month="{{ $order->created_at->month }}">
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

@section('script')
    <script>
         document.getElementById('downloadPdfButton').addEventListener('click', function(event) {
        event.preventDefault();
        var month = document.getElementById('filterMonth').value;
        var year = document.getElementById('filterYear').value;
        var url = "{{ route('admin.reports.orders.download') }}";
        var params = [];

        if (month) {
            params.push("month=" + month);
        }
        if (year) {
            params.push("year=" + year);
        }

        if (params.length > 0) {
            url += "?" + params.join("&");
        }

        window.location.href = url;
    });

    document.getElementById('orderFilter').addEventListener('input', filterOrders);
    document.querySelectorAll('.filter-status').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.filter-status').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            filterOrders();
        });
    });
    document.getElementById('filterMonth').addEventListener('change', filterOrders);
    document.getElementById('filterYear').addEventListener('change', filterOrders);

    function filterOrders() {
        var filter = document.getElementById('orderFilter').value.toLowerCase();
        var status = document.querySelector('.filter-status.active') ? document.querySelector('.filter-status.active').dataset.status : '';
        var month = document.getElementById('filterMonth').value;
        var year = document.getElementById('filterYear').value;

        var rows = document.querySelectorAll('#orderTableBody tr');

        rows.forEach(function(row) {
            var orderId = row.cells[0].textContent.toLowerCase();
            var user = row.cells[1].textContent.toLowerCase();
            var product = row.cells[2].textContent.toLowerCase();
            var quantity = row.cells[3].textContent.toLowerCase();
            var totalPrice = row.cells[4].textContent.toLowerCase();
            var rowStatus = row.dataset.status.toLowerCase();
            var rowMonth = row.dataset.month;
            var rowYear = new Date(row.cells[6].textContent).getFullYear();
            var date = row.cells[6].textContent.toLowerCase();

            var matchesFilter = orderId.includes(filter) || user.includes(filter) || product.includes(filter) ||
                                quantity.includes(filter) || totalPrice.includes(filter) || date.includes(filter);
            var matchesStatus = !status || rowStatus === status;
            var matchesMonth = !month || rowMonth == month;
            var matchesYear = !year || rowYear == year;

            if (matchesFilter && matchesStatus && matchesMonth && matchesYear) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }



        document.getElementById('orderFilter').addEventListener('input', filterOrders);
        document.querySelectorAll('.filter-status').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.filter-status').forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                filterOrders();
            });
        });
        document.getElementById('filterMonth').addEventListener('change', filterOrders);

        function filterOrders() {
            var filter = document.getElementById('orderFilter').value.toLowerCase();
            var status = document.querySelector('.filter-status.active') ? document.querySelector('.filter-status.active')
                .dataset.status : '';
            var month = document.getElementById('filterMonth').value;

            var rows = document.querySelectorAll('#orderTableBody tr');

            rows.forEach(function(row) {
                var orderId = row.cells[0].textContent.toLowerCase();
                var user = row.cells[1].textContent.toLowerCase();
                var product = row.cells[2].textContent.toLowerCase();
                var quantity = row.cells[3].textContent.toLowerCase();
                var totalPrice = row.cells[4].textContent.toLowerCase();
                var rowStatus = row.dataset.status.toLowerCase();
                var rowMonth = row.dataset.month;
                var date = row.cells[6].textContent.toLowerCase();

                var matchesFilter = orderId.includes(filter) || user.includes(filter) || product.includes(filter) ||
                    quantity.includes(filter) || totalPrice.includes(filter) || date.includes(filter);
                var matchesStatus = !status || rowStatus === status;
                var matchesMonth = !month || rowMonth === month;

                if (matchesFilter && matchesStatus && matchesMonth) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
@endsection
