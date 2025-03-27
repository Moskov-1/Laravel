<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Blog</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($blogs as $blog)
        <h1>{{ $blog->title }}</h1>
        <h4>Writer: {{$blog->user->name}}</h4>
        <textarea style="background-color: rgb(2, 3, 0); border-color: white;" name="blog" rows="5" cols="50" disabled>
            {{ $blog->description }}
        </textarea>
        <br>
        <a style="display: block;" href="{{ route('blog.edit', [$blog->id]) }}">
            <button style="background-color: blue;">EDIT</button></a>
        <br>
        <form action="{{ route("blog.delete",[$blog->id]) }}" method="POST">
            @csrf
            <button style="background-color: red;" type="submit">DELETE</button>
        </form>

        <hr>
        <br>
    @endforeach
</body>
</html>
