<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
        <h1>Register</h1>
        <form action="{{ route('singup') }}" method="POST">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Pass</label>
                <input type="password" name="password">
            </div>
            <div><button type="submit">submit</button></div>
        </form>
</body>
</html>
