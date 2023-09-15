<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'N-Vite')</title>
        @yield('link')
        <link rel="stylesheet" href="{{ asset('css/MainLayout.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <script src="{{ asset('js/jquery-3.6.4.js') }}"></script>
</head>

<body>
    <header>
        <div class="logo"><i class="fas fa-user-secret me-2"></i>
            N-Vite<b>.</b></div>
        <nav>
            <ul class="nav_link">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">Category</button>
                        <div class="dropdown-content">
                            @foreach(DB::table('category')->get() as $cat)
                            <a href="{{ route('category', ['id' => $cat->category_id]) }}">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        @if(auth()->check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="loginbtn" type="submit">Logout</button>
                <a class="loginbtn" href="{{ route('order') }}">Orders</a>
            </form>
        @else
            <a class="loginbtn" href="{{ route('login') }}">Login/Register</a>
        @endif

    </header>
    <main>
        @yield('content')
    </main>

    <footer>

        <ul>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('t&c') }}">Terms and Conditions</a></li>
            <li><a href="{{ route('contactus') }}">Contact Us</a></li>
        </ul>
        <p>&copy; 2023 Our Company. All rights reserved.</p>
    </footer>
</body>

</html>
