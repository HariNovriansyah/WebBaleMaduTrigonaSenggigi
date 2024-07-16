<nav class="navbar navbar-expand-lg navbar-light bg-white m-2 rounded-4 fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" style="color: #405D72; font-weight: 700;" href="{{ route('admin.dashboard') }}">MARI<span style="color: #ffbd67;">LAGI</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>  <form method="POST" action="{{ route('logout') }}">
                            @csrf<a class="dropdown-item"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a></form></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar h-100 bg-white m-2 rounded-4">
    <ul class="list-unstyled">
        <p>Menu</p>
        <li class="nav-item">
            <a class="nav-link" id="dashboard" href="{{ route('admin.dashboard') }}" data-route="{{ route('admin.dashboard') }}">
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlogs" role="button" data-bs-toggle="collapse"
                data-bs-target="#blogsDropdown" aria-expanded="false" aria-controls="blogsDropdown" data-route="{{ route('blogs.index') }} {{ route('blogs.create') }}">
                Blogs <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled" id="blogsDropdown">
                <li><a class="dropdown-item" href="{{ route('blogs.index') }}" data-route="{{ route('blogs.index') }}">View Blogs</a></li>
                <li><a class="dropdown-item" href="{{ route('blogs.create') }}" data-route="{{ route('blogs.create') }}">Create Blog</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-bs-toggle="collapse"
                data-bs-target="#productsDropdown" aria-expanded="false" aria-controls="productsDropdown" data-route="{{ route('products.index') }} {{ route('products.create') }}">
                Products <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled" id="productsDropdown">
                <li><a class="dropdown-item" href="{{ route('products.index') }}" data-route="{{ route('products.index') }}">View Products</a></li>
                <li><a class="dropdown-item" href="{{ route('products.create') }}" data-route="{{ route('products.create') }}">Create Product</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDelivery" role="button" data-bs-toggle="collapse"
                data-bs-target="#deliveryDropdown" aria-expanded="false" aria-controls="deliveryDropdown" data-route="{{ route('delivery.index') }} ">
                Delivery <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled" id="deliveryDropdown">
                <li><a class="dropdown-item" href="{{ route('delivery.index') }}" data-route="{{ route('delivery.index') }}">Manage Deliveries</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownReports" role="button" data-bs-toggle="collapse"
                data-bs-target="#reportsDropdown" aria-expanded="false" aria-controls="reportsDropdown" data-route="{{ route('admin.reports.orders') }}">
                Reports <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled" id="reportsDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.reports.orders') }}" data-route="{{ route('admin.reports.orders') }}">View Reports</a></li>
            </ul>
        </li>
    </ul>
</div>
