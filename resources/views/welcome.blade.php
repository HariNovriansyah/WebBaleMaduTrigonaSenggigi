@extends('app.layouts.app')
@section('content')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i
                                class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item bg-primary">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-start">
                                <h4 class="text-white text-uppercase fw-bold mb-4">Selamat Datang di website MARILAGI</h4>
                                <h1 class="display-1 text-white mb-4">Mari Mulai Hidup Sehat</h1>
                                <p class="mb-5 fs-5">Karena Madu Trigona, yang dihasilkan oleh lebah kelulut tanpa sengat,
                                    menawarkan beragam manfaat kesehatan yang luar biasa.
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 animated fadeInRight">
                            <div class="calrousel-img" style="object-fit: cover;">
                                <img src="{{ asset('assets/templates/img/carousel-2.png') }}" class="img-fluid w-100"
                                    alt="">
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
                                <img src="{{ asset('assets/templates/img/carousel-2.png') }}" class="img-fluid w-100"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 animated fadeInRight">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-white text-uppercase fw-bold mb-4">Selamat Datang di website MARILAGI</h4>
                                <h1 class="display-1 text-white mb-4">Sehat Membuat Anda Bahagia</h1>
                                <p class="mb-5 fs-5">Yuk, jadikan madu Trigona sebagai bagian dari pola hidup sehat Anda dan
                                    rasakan manfaatnya setiap hari!
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i
                                            class="fas fa-play-circle me-2"></i> Watch Video</a>
                                    <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Features</h4>
                <h1 class="display-4 mb-4">Madu Trigona untuk Masa Depan yang Sehat</h1>
                <p class="mb-0">
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0" style="height: 55vh">
                        <div class="feature-icon p-4 mb-4">
                            <i class="far fa-handshake fa-2x"></i>
                        </div>
                        <h4 class="mb-4">100% Pure and Natural</h4>
                        <p class="mb-4">Madu Trigona Senggigi dipanen langsung dari lebah kelulut yang hidup di lingkungan
                            alami tanpa campuran bahan kimia. Kami menjamin kemurnian dan kualitas terbaik dalam setiap
                            tetes madu.
                        </p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4 pt-0" style="height: 55vh">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-dollar-sign fa-2x"></i>
                        </div>
                        <h4 class="mb-4">Rich in Nutrients</h4>
                        <p class="mb-4">Dikenal dengan kandungan nutrisi yang tinggi, Madu Trigona Senggigi mengandung
                            berbagai vitamin, mineral, enzim, dan antioksidan yang bermanfaat untuk kesehatan jasmani tubuh
                            Anda.
                        </p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4 pt-0" style="height: 55vh">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-bullseye fa-2x"></i>
                        </div>
                        <h4 class="mb-4">Health Benefits</h4>
                        <p class="mb-4">Madu Trigona Senggigi menawarkan berbagai manfaat kesehatan, termasuk
                            meningkatkan sistem kekebalan tubuh, mendukung kesehatan pencernaan, serta membantu dalam
                            penyembuhan luka dan peradangan.
                        </p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4 pt-0" style="height: 55vh">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-headphones fa-2x"></i>
                        </div>
                        <h4 class="mb-4">Trusted Quality</h4>
                        <p class="mb-4">Dengan proses produksi yang ketat dan standar kualitas tinggi, Madu Trigona
                            Senggigi memberikan Anda produk yang dapat dipercaya untuk konsumsi harian dan kesehatan
                            keluarga.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-4 mb-4">Madu Trigona Senggigi</h1>
                <p class="mb-0">Aplikasi Madu Trigona Senggigi menawarkan berbagai layanan untuk mendukung kesehatan dan
                    kesejahteraan Anda. Temukan keunggulan dari produk kami yang berkualitas tinggi dan alami.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('assets/templates/img/blog-1.png') }}" class="img-fluid rounded-top w-100"
                                alt="Pure and Natural Honey">
                            <div class="service-icon p-3">
                                <i class="fa fa-leaf fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">100% Pure and Natural</a>
                                <p class="mb-4">Nikmati madu murni yang dipanen langsung dari lebah kelulut tanpa bahan
                                    kimia atau aditif.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('assets/templates/img/blog-2.png') }}" class="img-fluid rounded-top w-100"
                                alt="Rich in Nutrients">
                            <div class="service-icon p-3">
                                <i class="fa fa-apple-alt fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Kaya Nutrisi</a>
                                <p class="mb-4">Mengandung vitamin, mineral, enzim, dan antioksidan yang bermanfaat untuk
                                    kesehatan tubuh Anda.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('assets/templates/img/blog-3.png') }}" class="img-fluid rounded-top w-100"
                                alt="Health Benefits">
                            <div class="service-icon p-3">
                                <i class="fa fa-heart fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Manfaat Kesehatan</a>
                                <p class="mb-4">Meningkatkan sistem kekebalan tubuh, mendukung kesehatan pencernaan, dan
                                    membantu penyembuhan luka.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('assets/templates/img/blog-4.png') }}" class="img-fluid rounded-top w-100"
                                alt="Trusted Quality">
                            <div class="service-icon p-3">
                                <i class="fa fa-check fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Kualitas Terpercaya</a>
                                <p class="mb-4">Diproduksi dengan standar kualitas tinggi dan proses ketat untuk
                                    memastikan kepercayaan Anda.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- FAQs Start -->
    <div class="container-fluid faq-section bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="h-100">
                        <div class="mb-5">
                            <h4 class="text-primary">Some Important FAQ's</h4>
                            <h1 class="display-4 mb-0">Pertanyaan Umum Seputar Madu Trigona</h1>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Q: Apa itu madu Trigona?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show active"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body rounded">
                                        A: Madu Trigona adalah madu yang diproduksi oleh lebah kelulut (Trigona spp.), jenis
                                        lebah kecil yang tidak memiliki sengat. Mereka hidup dalam koloni kecil dan
                                        sarangnya biasanya terletak di tempat-tempat tersembunyi seperti dalam batang pohon
                                        atau celah kayu.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Q: Bagaimana rasanya?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        A: Madu Trigona memiliki rasa yang unik dan khas, cenderung lebih asam daripada madu
                                        yang dihasilkan oleh lebah lainnya. Ini disebabkan oleh kandungan asam amino dan
                                        senyawa lain yang berbeda dalam madu Trigona.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Q: Apakah madu Trigona memiliki manfaat kesehatan?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        A:Ya, madu Trigona telah dikenal memiliki berbagai manfaat kesehatan. Beberapa
                                        manfaat yang diklaim termasuk meningkatkan sistem kekebalan tubuh, mengurangi
                                        peradangan, dan digunakan dalam pengobatan tradisional untuk berbagai kondisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <img src="{{ asset('assets/templates/img/carousel-2.png') }}" class="img-fluid w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">From Blog</h4>
                <h1 class="display-4 mb-4">News And Updates</h1>
                <p class="mb-0">update berita seputar masalah kesehatan dan sebagainya.
                </p>
            </div>


            <div class="row g-4 justify-content-center">

                @foreach ($blogs as $blog)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="blog-item">
                            <div id="blogImagesCarousel{{ $blog->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach (json_decode($blog->images) as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($image) }}"
                                                class="d-block w-100 img-fluid rounded-top" alt="Blog Image" style="height: 250px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev bg-transparent" type="button"
                                    data-bs-target="#blogImagesCarousel{{ $blog->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next bg-transparent" type="button"
                                    data-bs-target="#blogImagesCarousel{{ $blog->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="blog-content p-4">
                                <div class="blog-comment d-flex justify-content-between mb-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span>
                                        {{ $blog->author->username }}</div>
                                    <div class="small"><span class="fa fa-calendar text-primary"></span>
                                        {{ $blog->created_at->format('d M Y') }}</div>
                                    <div class="small"><span class="fa fa-comment-alt text-primary"></span> 6 Comments
                                    </div>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">{{ $blog->title }}</a>
                                <p class="mb-3">{{ Str::limit($blog->content, 100) }}</p>
                                <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}"
                                    class="btn btn-primary text-white rounded-pill py-2 px-4">Read More <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->



@endsection
