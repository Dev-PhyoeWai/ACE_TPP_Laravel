<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Articles</title>
</head>
<body>
    <h1>Create Articles</h1>

    <div class="container">
    {{--    @method('PUT')    --}}
        <form method="post" action="{{ route('articles.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div><br>
                <div class="col">
                    <input type="number" name="age" class="form-control" placeholder="age">
                </div><br>
                <div class="col">
                    <input type="text" name="city" class="form-control" placeholder="city">
                </div><br>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</body>
</html>
