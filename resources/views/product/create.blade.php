<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
</head>
<body>
<h1>Create Product</h1>
<div class="container">
<form method="post" action="{{route('productStore')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="productName">Name</label>
            <input type="text" name="name" class="form-control" id="productName" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="productType">Type</label>
            <input type="text" name="type" class="form-control" id="productType" placeholder="Type">
        </div>
        <div class="form-group">
            <label for="productImage">Image</label>
            <input type="file" name="image" class="form-control-file" id="productImage">
        </div>
        <div class="form-group">
            <label for="productPrice">Price</label>
            <input type="number" name="price" class="form-control" id="productPrice" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="productQuantity" placeholder="Quantity">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
</form>
</div>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
</body>
</html>
