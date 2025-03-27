<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
</head>
<body>
        <form action="{{ route('api.store') }}" method="POST">
            @csrf
            <input type="text" name="title"  placeholder="name">
            <input type="text" name="content" placeholder="content">
            <input type="text" name="user_id" placeholder="user_id">
            <button>submit</button>
        </form>

        <h1>All Posts</h1>
        @foreach ($posts as $post)
            <h3>{{ $post->title }}</h3>
            <p>{{$post->content}}</p>
        @endforeach
</body>
</html>
