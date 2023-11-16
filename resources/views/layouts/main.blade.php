<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="/all_users">All Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/all_tasks">All Tasks</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/all_gifts">All Gifts</a>
    </li>
    @if (Route::has('login'))
        @auth
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">Olá, {{Auth::user()->name}}</li>
            <form action="{{route('logout')}}" method="post">
               @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @else
            <li class="nav-item">
                <a class="nav-link" href="/login">Log In</a>
            </li>

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif
        @endauth
    @endif
</ul>
@yield('content')
<footer style="">
    <h3>This is a footer</h3>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
