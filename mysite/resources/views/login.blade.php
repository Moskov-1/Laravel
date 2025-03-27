<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form style="display:flex; align-items:center; flex-direction:column"
        action="/login" method="POST">
        @csrf

            @if (session('error'))
                <div>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
        <table style="max-width: 5rem">
            <caption>LOGIN</caption>
            <tr>
                <td>
                    <label for="email">Email:</label>
                </td>
                 <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>
                    @error('email')
                        {{ $message }}
                    @enderror
                </td>

            </tr>
            <tr>
                <td>
                    <label for="password">Password:</label>
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    @error('password')
                        {{ $message }}
                    @enderror
                </td>

            </tr>
            <tr><td colspan="2">
                <input type="submit" style="width: 100%" value="login">
            </td></tr>
        </table>
    </form>
</body>
</html>
