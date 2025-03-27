<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mysite</title>
</head>
<body>
  <h1><center>Getting Started
    <a href="{{ route('blog.write') }}">write blog</a>
    <a href="{{ route('blog.all') }}">all blogs</a>
</center></h1>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @auth
        <h1>Hi {{ auth()->user()->name }} You are logged in</h1>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @foreach (auth()->user()->blogs as $blog)
            <a href="blog/{{ $blog->id }}"><h3>{{$blog->title}}</h3></a>
            <hr>
        @endforeach
    @else
        <form style="display:flex; justify-content:center;"
        method="POST" action="/"
        >
            @csrf
            <table>
                <caption>REGISTRATION</caption>
                <tbody>
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td>
                            <input type="text" name="name" placeholder="name">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Email</label></td>
                        <td>
                            <input type="email" placeholder="email" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td>
                            <input type="password" placeholder="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input style="width: 100%;" type="submit" value="register">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="/login">
                                <input style="width: 100%;" type="button" value="login">
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>

        </form>

    @endauth
</body>
</html>
