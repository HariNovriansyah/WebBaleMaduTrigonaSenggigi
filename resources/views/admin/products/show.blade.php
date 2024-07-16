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

    <div class="container mt-5">
        @if ($products->isEmpty())
            <p class="text-muted">No products available.</p>
        @else
            @foreach ($products as $product)
                <!-- Service Start -->
                <div class="container-fluid service">
                    <div class="container py-5">
                        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                            <h4 class="text-primary">Product</h4>
                            <h1 class="display-4 mb-4">We Have Best Product</h1>
                            <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci
                                facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad
                                culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                            </p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="service-item">


                                    <!-- Carousel for Images -->
                                    <div id="productImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach (json_decode($product->images) as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset($image) }}"
                                                        class="d-block w-100 img-fluid rounded-top" alt="Product Image">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#productImagesCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#productImagesCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                    <div class="service-content p-4">
                                        <div class="service-content-inner">
                                            <a href="#"
                                                class="d-inline-block h4 mb-4">{{ $product->product_name }}</a>
                                            <p class="mb-4">{{ $product->description }}</p>
                                            <p class="mb-4"><strong>Rp. {{ number_format($product->price, 2) }}</strong>
                                            </p>
                                            <p class="mb-4"><strong>Stock : {{ $product->stock }}</strong></p>
                                            <a href="{{ route('order.create', $product->id) }}"
                                                class="btn btn-primary rounded-pill py-2 px-4">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Service End -->
            @endforeach
        @endif

        <h2 class="mb-4 text-center">Reviews</h2>
        @foreach ($products as $product)
            @if ($product->reviews->isNotEmpty())
                <div class="card mb-4">
                    <div class="card-body">
                        @foreach ($product->reviews as $review)
                            <div class="mb-3 border-bottom pb-3">
                                <p><strong>{{ $review->user->name }}</strong> rated <span
                                        class="badge bg-secondary">{{ $review->rating }}</span> out of 5</p>
                                <p>{{ $review->review }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
