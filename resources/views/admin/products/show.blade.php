@extends('app.layouts.app')
@section('style')
    <style>
        .star-rating {
            display: flex;
            align-items: center;
        }

        .star {
            font-size: 1.5rem;
            /* Adjust size as needed */
            color: #ccc;
            /* Grey color for empty stars */
        }

        .star.filled,
        .star.half-filled {
            color: #ffc107;
            /* Gold color for filled stars */
        }

        .star.half-filled:before {
            content: "\2605";
            position: absolute;
            width: 50%;
            overflow: hidden;
            color: #ffc107;
        }

        .service .service-content {
            border-radius: 1rem;
        }

        .service .service-content::after {
            border-radius: 1rem;
        }
    </style>
@endsection
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
                @if ($products->isEmpty())
                    <p class="text-muted">No products available.</p>
                @else
                    @foreach ($products as $product)
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-12 col-lg-12 col-xl-12 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="service-item d-flex" style="flex-wrap: wrap;">
                                    <!-- Carousel for Images -->
                                    <div class="col-md-5 d-flex" style="padding: 0;">
                                        <div id="productImagesCarousel{{ $product->id }}" class="carousel slide w-100"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach (json_decode($product->images) as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                                                        style="height: 300px;">
                                                        <img src="{{ asset($image) }}"
                                                            class="d-block w-100 img-fluid rounded" alt="Product Image"
                                                            style="height: 100%; object-fit: cover;">
                                                    </div>
                                                @endforeach
                                                <button class="carousel-control-prev bg-transparent" type="button"
                                                    data-bs-target="#productImagesCarousel{{ $product->id }}"
                                                    data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next bg-transparent" type="button"
                                                    data-bs-target="#productImagesCarousel{{ $product->id }}"
                                                    data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Service Content -->
                                    <div class="col-md-7 h-100"
                                        style="display: flex; flex-direction: column; justify-content: center;">
                                        <div class="service-content p-4 mx-4">
                                            <div class="service-content-inner">
                                                <a href="#"
                                                    class="d-inline-block h4 mb-4">{{ $product->product_name }}</a>
                                                <div class="m-3" style="max-height: 200px; overflow-y: auto;">
                                                    <p class="mb-4">{!! nl2br(e($product->description)) !!}</p>
                                                </div>
                                                <p class="mb-0 fs-2"><strong>Rp{{ number_format($product->price, 2) }}</strong>
                                                </p>
                                                <p class="mb-4">{{ $product->stock }} left</p>

                                                <!-- Average Rating -->
                                                @if ($product->reviews->isNotEmpty())
                                                    @php
                                                        $averageRating = $product->reviews->avg('rating');
                                                        $roundedRating = round($averageRating * 2) / 2; // Rounded to the nearest 0.5
                                                    @endphp
                                                    <div class="mb-4">
                                                        <div class="star-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $roundedRating)
                                                                    <span class="star filled">&#9733;</span>
                                                                @elseif ($i == ceil($roundedRating))
                                                                    <span class="star half-filled">&#9733;</span>
                                                                @else
                                                                    <span class="star">&#9734;</span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <p>{{ number_format($averageRating, 1) }} out of 5</p>
                                                    </div>
                                                @endif

                                                <a href="{{ route('order.create', $product->id) }}"
                                                    class="btn btn-primary rounded-pill py-2 px-4">Order</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
        <!-- Service End -->

        <h2 class="mb-4 text-center">Reviews</h2>
        @foreach ($products as $product)
            @if ($product->reviews->isNotEmpty())
                <div class="card mb-4">
                    <div class="card-body">
                        @foreach ($product->reviews as $review)
                            <div class="mb-3 border-bottom pb-3">
                                <p><strong>{{ $review->user->name }}</strong> rated:</p>
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <span class="star filled">&#9733;</span>
                                        @else
                                            <span class="star">&#9734;</span>
                                        @endif
                                    @endfor
                                </div>
                                <p>{{ $review->rating }} out of 5</p>
                                <p>{{ $review->review }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

    </div>

@endsection
