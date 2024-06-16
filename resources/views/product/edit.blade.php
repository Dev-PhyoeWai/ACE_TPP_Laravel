
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4 mb-4">Edit Product</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('productUpdate', $data->id) }}" enctype="multipart/form-data">
        @csrf
        {{--    FeatureDay05 dev_phyoewai--}}
        {{--    @method('PUT')--}}

        <div class="form-group mb-4">
            <label for="productName">Name</label>
            <input type="text" name="name" class="form-control" id="productName" value="{{ $data->name }}">
        </div>

        <div class="form-group mb-4">
            <label for="productType">Type</label>
            <input type="text" name="type" class="form-control" id="productType" value="{{ $data->type }}">
        </div>

        <div class="form-group mb-4">
            <label for="productImages">Images</label>
            <input type="file" name="images[]" class="form-control-file" id="productImages" multiple>
            <div>
                {{--    FeatureDay05 dev_phyoewai--}}
                @foreach ($data->images as $image)
                    <img src="{{ $image->image_path }}" alt="Product Image" style="width: 100px; height: 100px;">
                @endforeach
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="productPrice">Price</label>
            <input type="number" name="price" class="form-control" id="productPrice" value="{{ $data->price }}">
        </div>

        <div class="form-group mb-4">
            <label for="productQuantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="productQuantity" value="{{ $data->quantity }}">
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </form>
</div>

<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
</body>
</html>

