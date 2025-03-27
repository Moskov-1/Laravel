<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Edit</title>
</head>
<body>
    <form action="{{ route('blog.update', [$blog->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input name="title" type="text" value="{{ $blog->title }}">
        <br>
        <label for="description">Content:</label><br>
        <textarea name="description" rows="5" cols="50" >{{ $blog->description }}</textarea>
         <br>
        <button type="submit">Update</button>
    </form>
    <br>
    <span><a href="/">Cancel</a></span>
</body>
</html>
