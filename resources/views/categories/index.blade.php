<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
<div class="container">
    <h1>Category Details</h1>
    <div class="row">
        <div class="col-6">
            <a class="fa-regular fa-circle-left danger" href="{{url('/')}}"></a>
        </div>
        <div class="col-6 flex-end">
            <a href="{{route('categoryCreate')}}" class="category_create">Create</a>
        </div>
    </div>
    <hr/>
    {{--    @dd($data);--}}
    <table class="table table-bordered">
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

                    <div class="row">
                        <div class="col-2">
                            <button class="btn btn-sm btn-warning">
                                <a href="{{route('categoryEdit', ['id'=>$d->id])}}">Edit</a>
                            </button>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
