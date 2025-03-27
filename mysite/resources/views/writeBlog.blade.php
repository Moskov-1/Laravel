<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write Blog</title>
</head>
<body>
    <form style="display:flex; justify-content:center;"
        method="POST" action="{{ route('blog.store') }}"
    >
        @csrf
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <caption>Blog</caption>
            <tr>
                <td>
                    <label for="title">Title:</label>
                </td>
                 <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td>
                    @error('title')
                        {{ $message }}
                    @enderror
                </td>

            </tr>
            <tr>
                <td>
                    <label for="description">Content:</label>
                </td>
                <td>
                    <input type="textarea" name="description">
                </td>
            </tr>
            <tr>
                <td>
                    @error('description')
                        {{ $message }}
                    @enderror
                </td>

            </tr>
            <tr><td colspan="2">
                <input type="submit" style="width: 100%" value="publish">
            </td></tr>
            <tr><td colspan="2">
                <button style="width:100%"><a href="{{ url('/') }}">Back</a></button>
            </td></tr>
        </table>
    </form>
</body>
</html>
