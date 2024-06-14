<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Details</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
</head>
<body>

    <h1>Article Details</h1>
    <a href="{{ route('articles.create')}}">Create</a>

    <hr/>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">City</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($article as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->name}}</td>
                <td>{{$a->age}}</td>
                <td>{{$a->city}}</td>
                <td>
                    {{--    @method('dev_phyoewai')    --}}
                    @csrf
                    @method('PATCH')
                    <a href="{{ route('articles.edit', $a->id) }}">Edit</a> |
                    <form action="{{ route('articles.destroy', $a->id) }}" method="post">
                    {{--    @method('dev_phyoewai')    --}}
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/popper.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>
