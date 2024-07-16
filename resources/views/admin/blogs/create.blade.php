@extends($layout)

@section('content')
<div class="container p-5 bg-white rounded-4">
    <h1 class="display-4 mb-4">Create New Blog</h1>

    <form action="{{ route('blogs.store') }}" method="POST" id="blog-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content" class="col-form-label">Content</label>
            <textarea id="content" name="content" rows="4" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="images" class="col-form-label">Images</label>
            <input type="file" id="images" name="images[]" class="form-control" multiple>
            <div id="image_preview" class="mt-2 d-flex flex-wrap">
                <!-- Image previews will be displayed here -->
            </div>
        </div>
        <div class="form-group">
            <label for="video" class="col-form-label">YouTube Video URL</label>
            <input type="url" id="video" name="video" class="form-control" placeholder="https://www.youtube.com/watch?v=example" required>
        </div>
        <div class="form-group">
            <label for="video_preview" class="col-form-label">Video Preview</label>
            <div id="video_preview" class="embed-responsive embed-responsive-16by9">
                <!-- Video preview will be embedded here -->
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit">Create Blog</button>
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
</script>
@endsection
