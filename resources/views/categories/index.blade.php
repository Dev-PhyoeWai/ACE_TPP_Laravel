<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
<div class="container">
    <h1 class="text-center mt-4 mb-4">Category Details</h1>
    <div class="row mb-4">
        <div class="col-6">
            <a href="{{url('/')}}"><i class="fa-solid fa-house fa-xl"></i></a>
        </div>
        <div class="col-6 text-end">
            <a href="{{route('categoryCreate')}}" class="btn btn-sm btn-info text-white">Create</a>
        </div>
    </div>

    {{--    @dd($data);--}}
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>

                    <div class="row d-flex justify-content-center">
                        <div class="col-2">
                            <a href="{{route('categoryEdit', ['id'=>$d->id])}}" class="btn btn-sm btn-warning text-white">
                               Edit</a>
                        </div>
                        <div class="col-4">
                            <form action="{{route('categoryDelete', $d->id)}}" method="post">
                                @csrf
                                <button  class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            {{--            <a href="">Delete</a>           --}}
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
