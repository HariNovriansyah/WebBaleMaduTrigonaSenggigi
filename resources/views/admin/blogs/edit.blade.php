@extends($layout)

@section('content')
<div class="container p-5 bg-white rounded-4">
    <h1 class="display-4 mb-4">Edit Blog</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" id="blog-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $blog->title }}" required>
        </div>
        <div class="form-group">
            <label for="content" class="col-form-label">Content</label>
            <textarea id="content" name="content" rows="4" class="form-control" required>{{ $blog->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="images" class="col-form-label">Images</label>
            <input type="file" id="images" name="images[]" class="form-control" multiple>
            <div id="image_preview" class="mt-2 d-flex flex-wrap">
                  <!-- Existing images -->
                  @foreach (json_decode($blog->images, true) as $image)
                  <div class="image-container mr-2 mb-2 d-flex flex-column align-items-center">
                      <img src="{{ asset($image) }}" class="img-thumbnail mb-1" style="width: 150px;">
                  </div>
              @endforeach
              <!-- New image previews will be displayed here -->
            </div>
        </div>
        <div class="form-group">
            <label for="video" class="col-form-label">YouTube Video URL</label>
            <input type="url" id="video" name="video" class="form-control" value="{{ $blog->video }}" placeholder="https://www.youtube.com/watch?v=example" required>
        </div>
        <div class="form-group">
            <label for="video_preview" class="col-form-label">Video Preview</label>
            <div id="video_preview" class="embed-responsive embed-responsive-16by9">
                <!-- Existing video preview -->
                @if ($blog->video)
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ explode('v=', $blog->video)[1] }}" allowfullscreen></iframe>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit" >Update Blog</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-link">Back to Blog Index</a>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    document.getElementById('video').addEventListener('input', function() {
        const videoUrl = this.value;
        const videoId = videoUrl.split('v=')[1]?.split('&')[0];
        const videoPreview = document.getElementById('video_preview');
        if (videoId) {
            videoPreview.innerHTML = `<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/${videoId}" allowfullscreen></iframe>`;
        } else {
            videoPreview.innerHTML = '';
        }
    });

    document.getElementById('images').addEventListener('change', function() {
        const imagePreview = document.getElementById('image_preview');
        imagePreview.innerHTML = ''; // Clear previous previews

        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = document.createElement('img');
                img.src = event.target.result;
                img.alt = file.name;
                img.className = 'img-thumbnail mr-2 mb-2';
                img.style.width = '150px';
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    document.querySelectorAll('.btn-remove-image').forEach(button => {
        button.addEventListener('click', function() {
            const imageContainer = this.parentElement;
            imageContainer.remove();
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'removed_images[]';
            hiddenInput.value = this.getAttribute('data-image');
            document.getElementById('blog-form').appendChild(hiddenInput);
        });
    });
</script>

@endsection
