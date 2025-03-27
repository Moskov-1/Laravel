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
        <h1>{{ $blog->title }}</h1>
        <h4>Writer: {{$blog->user->name}}</h4>
        <textarea name="blog" rows='5' cols="50" disabled>{{ $blog->description }}</textarea>
        <br>
        <span><a href="{{ route('blog.edit', [$blog->id]) }}">EDIT</a></span>
        <span>
            @if ($is_author == true)

                <form action="{{ route("blog.delete",[$blog->id])}}" method="POST">
                    @csrf
                    <button type="submit">DELETE</button>
                </form>
            @endif
        </span><br>
        <span><a href="/">Cancel</a></span>
        <hr>
        <br>
</body>
</html>
