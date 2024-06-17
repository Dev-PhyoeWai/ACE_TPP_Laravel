<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4 mb-4">Create Product</h1>
    <div class="col-6">
        <a href="{{route('productIndex')}}" class="btn btn-sm btn-success text-white"><i class="fa-solid fa-arrow-left-long"></i>back</a>
    </div>
    <form method="post" action="{{route('productStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4 mb-4">
            <label for="productName">Name</label>
            <input type="text" name="name" class="form-control" id="productName" placeholder="Product Name">
        </div>
        <div class="form-group mb-4">
            <label for="productType">Type</label>
            <input type="text" name="type" class="form-control" id="productType" placeholder="Type">
        </div>
        <div class="form-group mb-4">
            <label for="productImages">Images</label>
            {{--   FeatureDay05 dev_phyoewai  --}}
            <input type="file" name="images[]" class="form-control-file" id="productImages" multiple>
        </div>
        <div class="form-group mb-4">
            <label for="productPrice">Price</label>
            <input type="number" name="price" class="form-control" id="productPrice" placeholder="Price">
        </div>
        <div class="form-group mb-4">
            <label for="productQuantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="productQuantity" placeholder="Quantity">
        </div>
        <button type="submit" class="btn btn-info text-white mb-4">Create</button>
    </form>
</div>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
</body>
</html>
