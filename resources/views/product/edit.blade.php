<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>
<body>
<h1>Edit Category</h1>
{{--{{route('categoryStore')}}--}}
<form method="post" action="{{route('productUpdate',$data->id)}}">
    @csrf

    <input type="text" name="name" id="" value="{{$data->name}}"/>
    <input type="text" name="type" id="" value="{{$data->type}}"/>
    <input type="file" name="image" id="" value="{{$data->image}}"/>
    <input type="text" name="price" id="" value="{{$data->price}}"/>
    <input type="text" name="quantity" id="" value="{{$data->quantity}}"/>

    <button type="submit">Update</button>
</form>
</body>
</html>
