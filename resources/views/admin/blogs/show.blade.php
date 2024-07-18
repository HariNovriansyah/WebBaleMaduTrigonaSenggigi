@extends($layout)

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">


                <div class="bg-light p-5 rounded">
                    <!-- Image Slideshow -->
                    @if ($blog->images)
                        <div id="imageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach (json_decode($blog->images, true) as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset($image) }}" class="d-block w-100 img-fluid rounded"
                                            alt="Image {{ $index + 1 }}" style="height: 400px; object-fit: cover;">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev bg-transparent" type="button" data-bs-target="#imageCarousel"
                                data-bs-slide="prev" style="border: none;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next bg-transparent" type="button" data-bs-target="#imageCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                    <h1 class="blog-title">{{ $blog->title }}</h1>
                    <p class="text-muted">Written by: {{ $blog->author->name }}</p>
                    <small class="text-muted">Published on: {{ $blog->created_at->format('d M Y') }}</small>
                    <hr>
                    <p class="blog-content">{!! nl2br(e($blog->content)) !!}</p>
                    <!-- Centered Video -->
                    @if ($blog->video)
                        <div class="video-container text-center mt-4">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ explode('v=', $blog->video)[1] }}"
                                    allowfullscreen width="100%" height="300px"></iframe>
                            </div>
                        </div>
                    @endif
                </div>



                <!-- Comment Section -->
                <section class="comment-section mt-5">
                    <h2>Comments</h2>
                    @foreach ($blog->comments as $comment)
                        <div class="bg-white p-3 rounded shadow-sm mb-3">
                            <p class="comment-author"><strong>{{ $comment->user->name }}</strong> commented:</p>
                            <p id="comment-content-{{ $comment->id }}">{{ $comment->content }}</p>
                            <small class="text-muted">Published on:
                                {{ $comment->created_at->format('d M Y, H:i') }}</small><br>
                            @if (Auth::check() && $comment->user_id == Auth::id())
                                <button class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="toggleEditForm({{ $comment->id }})">Edit</button>
                                <form id="edit-form-{{ $comment->id }}" method="post"
                                    action="{{ route('comments.update', $comment->id) }}" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <textarea name="content" class="form-control" required>{{ $comment->content }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            @endif
                        </div>
                    @endforeach

                    @auth
                        <form method="post" action="{{ route('comments.store', $blog->id) }}" class="mt-4">
                            @csrf
                            <div class="mb-3">
                                <label for="content" class="form-label">Add a comment:</label>
                                <textarea id="content" name="content" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
                    @endauth
                </section>
            </div>
        </div>
    </div>

    <script>
        function toggleEditForm(commentId) {
            var editForm = document.getElementById('edit-form-' + commentId);
            var commentContent = document.getElementById('comment-content-' + commentId);
            if (editForm.style.display === 'none') {
                editForm.style.display = 'block';
                commentContent.style.display = 'none';
            } else {
                editForm.style.display = 'none';
                commentContent.style.display = 'block';
            }
        }
    </script>
@endsection
