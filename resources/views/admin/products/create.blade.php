@extends($layout)
@section('content')
    <div class="container p-5 bg-white rounded-4">
        <h1 class="display-4">Create New Product</h1>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" id="product_name" name="product_name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="size" class="form-label">Product Size</label>
                <input type="text" id="size" name="size" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" id="images" name="images[]" class="form-control" multiple onchange="previewImages()">
            </div>
            <div class="form-group mb-3">
                <div id="preview" class="d-flex flex-wrap"></div>
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit">Create Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-link">Back to Product Index</a>
            </div>
        </form>
    </div>
@endsection

@section('script')
<script>
    function previewImages() {
        var preview = document.getElementById('preview');
        preview.innerHTML = ''; // Clear the preview div

        var files = document.getElementById('images').files;

        if (files) {
            [].forEach.call(files, readAndPreview);
        }

        function readAndPreview(file) {
            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            }

            var reader = new FileReader();

            reader.addEventListener("load", function () {
                var image = new Image();
                image.height = 100;
                image.title = file.name;
                image.classList.add('me-2', 'mb-2'); // Add margin classes
                image.src = this.result;
                preview.appendChild(image);
            });

            reader.readAsDataURL(file);
        }
    }
    </script>

@endsection
