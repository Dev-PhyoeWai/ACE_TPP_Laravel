<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <title>Document</title>
</head>
<body>

    <div class="container text-center">
        <h1 class="mb-4 mt-4">Burmese Laravel Developer</h1>
        <div class="row">
            <div class="col-4">
                <a href="{{route('categoryIndex')}}" class="btn btn-sm btn-info text-white">Category</a>
            </div>
            <div class="col-4">
                <a href="{{route('productIndex')}}" class="btn btn-sm btn-info text-white">Product</a>
            </div>
            <div class="col-4">
                <a href="{{route('articles.index')}}" class="btn btn-sm btn-info text-white">Article</a>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/popper.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>
