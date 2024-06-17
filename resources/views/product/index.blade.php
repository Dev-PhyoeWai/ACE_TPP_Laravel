<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Page</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4 mb-4">Products Details</h1>
    <div class="row">
        <div class="col-6">
            <a href="{{url('/')}}"><i class="fa-solid fa-house fa-xl"></i></a>
        </div>
        <div class="col-6 text-end">
            <a href="{{route('productCreate')}}" class="btn btn-sm btn-info text-white">Create</a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Images</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_item as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->type}}</td>
                <td>
                    @foreach($p->images as $image)
                        <img src="{{asset('uploads/'.$image->image_path)}}" width="40px" height="20px" class="img-thumbnail mb-1">
                    @endforeach
                </td>
                <td>{{$p->price}}</td>
                <td>{{$p->quantity}}</td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('productEdit', ['id' => $p->id])}}" class="btn btn-sm btn-warning text-white">Edit</a>
                        </div>
                        <div class="col-6">
                            <form action="{{route('productDelete', $p->id)}}" method="post">
                                @csrf
                                {{--    FeatureDay05 dev_phyoewai--}}
{{--                                @method('DELETE')--}}
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>
