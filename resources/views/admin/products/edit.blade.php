@extends($layout)
@section('content')

<div class="container p-5 bg-white rounded-4">
    <h1 class="display-4">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" id="product_name" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="images" class="form-label">Upload New Images</label>
            <input type="file" id="images" name="images[]" class="form-control" multiple onchange="previewImages()">
        </div>
        <div class="form-group mb-3">
            <div id="preview" class="d-flex flex-wrap">
                @foreach(json_decode($product->images) as $image)
                    <div class="me-2 mb-2">
                        <img src="{{ asset($image) }}" height="100" alt="Current Image">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit">Update Product</button>
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
