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

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">From Blog</h4>
                <h1 class="display-4 mb-4">News And Updates</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                    dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>


            <div class="row g-4 justify-content-center">

                @foreach ($blogs as $blog)
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('assets/templates/img/blog-3.png') }}"
                                    class="img-fluid rounded-top w-100" alt="">
                                <div class="blog-categiry py-2 px-4">
                                    <span></span>
                                </div>
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

    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a> --}}


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    </html>
@endsection
