@extends('app.layouts.app')
@section('content')

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>
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
                                <p class="mb-5 fs-5">Karena Madu Trigona, yang dihasilkan oleh lebah kelulut tanpa sengat, menawarkan beragam manfaat kesehatan yang luar biasa.
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
                                <h4 class="text-white text-uppercase fw-bold mb-4">Selamat Datang di website MARILAGI</h4>
                                <h1 class="display-1 text-white mb-4">Sehat Membuat Anda Bahagia</h1>
                                <p class="mb-5 fs-5">Yuk, jadikan madu Trigona sebagai bagian dari pola hidup sehat Anda dan rasakan manfaatnya setiap hari!
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

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Features</h4>
                <h1 class="display-4 mb-4">Insurance Provide you a Better Future</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="far fa-handshake fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Trusted Company</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-dollar-sign fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Anytime Money</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-bullseye fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Flexible Plans</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-headphones fa-3x"></i>
                        </div>
                        <h4 class="mb-4">24/7 Fast Support</h4>
                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                        </p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- About Start -->
    {{-- <div class="container-fluid bg-light about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content bg-white rounded p-5 h-100">
                        <h4 class="text-primary">About Our Company</h4>
                        <h1 class="display-4 mb-4">High Range of Exploring Protection</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt debitis sint tempora. Corporis consequatur illo blanditiis voluptates aperiam quos aliquam totam aliquid rem explicabo,
                        </p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae praesentium recusandae eligendi modi hic
                        </p>
                        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>We can save your money.</p>
                        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Production or trading of good</p>
                        <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Our life insurance is flexible</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Information</a>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-white rounded p-5 h-100">
                        <div class="row g-4 justify-content-center">
                            <div class="col-12">
                                <div class="rounded bg-light">
                                    <img src="img/about-1.png" class="img-fluid rounded w-100" alt="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">129</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Insurance Policies</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">99</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Awards WON</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">556</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Skilled Agents</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div class="counter-counting">
                                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">967</span>
                                        <span class="h1 fw-bold text-primary">+</span>
                                    </div>
                                    <h4 class="mb-0 text-dark">Team Members</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-4 mb-4">We Provide Best Services</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{asset('assets/templates/img/blog-1.png') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-users fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Life Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{asset('assets/templates/img/blog-2.png') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-hospital fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Health Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{asset('assets/templates/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-car fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Car Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="{{asset('assets/templates/img/blog-4.png') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="service-icon p-3">
                                <i class="fa fa-home fa-2x"></i>
                            </div>
                        </div>
                        <div class="service-content p-4">
                            <div class="service-content-inner">
                                <a href="#" class="d-inline-block h4 mb-4">Home Insurance</a>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Services</a>
                </div> --}}
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
                            <h1 class="display-4 mb-0">Common Frequently Asked Questions</h1>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Q: Apa itu madu Trigona?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show active" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body rounded">
                                        A: Madu Trigona adalah madu yang diproduksi oleh lebah kelulut (Trigona spp.), jenis lebah kecil yang tidak memiliki sengat. Mereka hidup dalam koloni kecil dan sarangnya biasanya terletak di tempat-tempat tersembunyi seperti dalam batang pohon atau celah kayu.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Q: Bagaimana rasanya?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        A: Madu Trigona memiliki rasa yang unik dan khas, cenderung lebih asam daripada madu yang dihasilkan oleh lebah lainnya. Ini disebabkan oleh kandungan asam amino dan senyawa lain yang berbeda dalam madu Trigona.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Q: Apakah madu Trigona memiliki manfaat kesehatan?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        A:Ya, madu Trigona telah dikenal memiliki berbagai manfaat kesehatan. Beberapa manfaat yang diklaim termasuk meningkatkan sistem kekebalan tubuh, mengurangi peradangan, dan digunakan dalam pengobatan tradisional untuk berbagai kondisi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                    <img src="{{asset('assets/templates/img/carousel-2.png') }}" class="img-fluid w-100" alt="">
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
                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>

   @if ($blogs->isNotEmpty())


                <div class="row g-4 justify-content-center">

                    @foreach ($blogs as $blog)

                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{asset('assets/templates/img/blog-3.png') }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="blog-categiry py-2 px-4">
                                    <span></span>
                                </div>
                            </div>
                            <div class="blog-content p-4">
                                <div class="blog-comment d-flex justify-content-between mb-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span> {{ $blog->author->username }}</div>
                                    <div class="small"><span class="fa fa-calendar text-primary"></span> {{ $blog->created_at->format('d M Y') }}</div>
                                    <div class="small"><span class="fa fa-comment-alt text-primary"></span> 6 Comments</div>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">{{ $blog->title }}</a>
                                <p class="mb-3">{{ $blog->content }}</p>
                                <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}" class="btn btn-primary text-white rounded-pill py-2 px-4">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <!-- Blog End -->

    <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Team</h4>
                <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('assets/templates/img/team-1.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('assets/templates/img/team-2.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('assets/templates/img/team-3.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('assets/templates/img/team-4.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">David James</h4>
                            <p class="mb-0">Profession</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Testimonial</h4>
                <h1 class="display-4 mb-4">What Our Customers Are Saying</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="{{asset('assets/templates/img/testimonial-1.jpg') }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="{{asset('assets/templates/img/testimonial-2.jpg') }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4  col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="{{asset('assets/templates/img/testimonial-3.jpg') }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">Client Name</h4>
                                <p class="mb-3">Profession</p>
                                <div class="d-flex text-primary mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star text-body"></i>
                                    <i class="fas fa-star text-body"></i>
                                </div>
                                <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-9">
                    <div class="mb-5">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-6 col-xl-5">
                                <div class="footer-item">
                                    <a href="index.html" class="p-0">
                                        <h3 class="text-white"><i class="fab fa-slack me-3"></i> LifeSure</h3>
                                        <!-- <img src="img/logo.png" alt="Logo"> -->
                                    </a>
                                    <p class="text-white mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                                    <div class="footer-btn d-flex">
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-3" href="#"><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-md-square rounded-circle me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="footer-item">
                                    <h4 class="text-white mb-4">Useful Links</h4>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> About Us</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Features</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Services</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ's</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Blogs</a>
                                    <a href="#"><i class="fas fa-angle-right me-2"></i> Contact</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="footer-item">
                                    <h4 class="mb-4 text-white">Instagram</h4>
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-1.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-1.jpg" data-lightbox="footerInstagram-1" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                       </div>
                                       <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-2.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-2.jpg" data-lightbox="footerInstagram-2" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                       </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-3.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-3.jpg" data-lightbox="footerInstagram-3" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                       </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-4.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-4.jpg" data-lightbox="footerInstagram-4" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                       </div>
                                        <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-5.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-5.jpg" data-lightbox="footerInstagram-5" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                       </div>
                                       <div class="col-4">
                                            <div class="footer-instagram rounded">
                                                <img src="img/instagram-footer-6.jpg" class="img-fluid w-100" alt="">
                                                <div class="footer-search-icon">
                                                    <a href="img/instagram-footer-6.jpg" data-lightbox="footerInstagram-6" class="my-auto"><i class="fas fa-link text-white"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="row g-4">
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Address</h4>
                                                <p class="mb-0">123 Street New York.USA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Mail Us</h4>
                                                <p class="mb-0">info@example.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="d-flex">
                                            <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                                <i class="fa fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-white">Telephone</h4>
                                                <p class="mb-0">(+012) 3456 7890</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="footer-item">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <div class="position-relative rounded-pill mb-4">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                            <button type="button" class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                        </div>
                        <div class="d-flex flex-shrink-0">
                            <div class="footer-btn">
                                <a href="#" class="btn btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                                    <i class="fa fa-phone-alt fa-2x"></i>
                                    <div class="position-absolute" style="top: 2px; right: 12px;">
                                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column ms-3 flex-shrink-0">
                                <span>Call to Our Experts</span>
                                <a href="tel:+ 0123 456 7890"><span class="text-white">Free: + 0123 456 7890</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-end mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-start text-body">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

@endsection
