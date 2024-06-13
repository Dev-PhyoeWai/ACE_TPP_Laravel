<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Articles</title>
</head>
<body>
<h1>Create Articles</h1>

<div class="container">
    <form action="{{ route('articles.update', $data->id) }}" method="POST">
        @csrf
        {{--    @method('love_mama')    --}}
        @method('PUT')
        <div class="row">
            <div class="col">
                <input type="text" name="name" value="{{$data->name}}" class="form-control">
            </div><br>
            <div class="col">
                <input type="number" name="age" value="{{$data->age}}" class="form-control">
            </div><br>
            <div class="col">
                <input type="text" name="city" value="{{$data->city}}" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
</body>
</html>
