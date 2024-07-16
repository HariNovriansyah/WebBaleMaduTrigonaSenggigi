@extends($layout)
@section('content')

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of 98a94c7 (update UI.)
        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-start">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">Welcome To Madu Trigona</h4>
                                    <h1 class="display-1 text-white mb-4">Life Insurance Makes You Happy</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 animated fadeInRight">
                                <div class="calrousel-img" style="object-fit: cover;">
                                    <img src="{{asset('assets/templates/img/carousel-2.png') }}" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">
                            <div class="col-lg-5 animated fadeInLeft">
                                <div class="calrousel-img">
                                    <img src="{{asset('assets/templates/img/carousel-2.png') }}" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 animated fadeInRight">
                                <div class="text-sm-center text-md-end">
                                    <h4 class="text-white text-uppercase fw-bold mb-4">Welcome To Madu Trigona</h4>
                                    <h1 class="display-1 text-white mb-4">Life Insurance Makes You Happy</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

<<<<<<< HEAD
=======
>>>>>>> parent of afef0c7 (Merge branch 'dev' of https://github.com/HariNovriansyah/WebBaleMaduTrigonaSenggigi into dev)
=======
>>>>>>> parent of 98a94c7 (update UI.)
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
                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="{{asset('assets/templates/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="service-icon p-3">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="d-inline-block h4 mb-4">{{ $product->product_name }}</a>
                                    <p class="mb-4">{{ $product->description }}</p>
                                    <p class="mb-4"><strong>Rp. {{ number_format($product->price, 2) }}</strong></p>
                                    <p class="mb-4"><strong>Stock : {{ $product->stock }}</strong></p>
                                    <a href="{{ route('order.create', $product->id) }}" class="btn btn-primary rounded-pill py-2 px-4">Order</a>
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
    @foreach($products as $product)
        @if ($product->reviews->isNotEmpty())
            <div class="card mb-4">
                <div class="card-body">
                    @foreach($product->reviews as $review)
                        <div class="mb-3 border-bottom pb-3">
                            <p><strong>{{ $review->user->name }}</strong> rated <span class="badge bg-secondary">{{ $review->rating }}</span> out of 5</p>
                            <p>{{ $review->review }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
</div>

@endsection
