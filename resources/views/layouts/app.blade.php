<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'System') }}</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <style>
        body {
            background-color: #2d3748;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
            z-index: 1000; /* set the z-index to be higher than any other element on the page */
            display: none; /* hide the overlay by default */
        }

        table {
            border-collapse: collapse;
            width: 70%;
        }
        th, td {
            text-align: center;
            padding: 4px;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }

        #popup-box {
            width: 400px;
            height: 400px;
            background-color: #989898;
            position: fixed;
            border-radius: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .container {
            background-color: #ffffff;
            width: 1000px;
            height: 700px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .container h2 {
            display: inline-block;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container h3 {
            font-size: 30px;
            margin-bottom: 20px;
            text-align: center;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: #f1f1f1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #2196F3;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button {
            display: inline-block;
            margin-right: 10px;
        }

    </style>

    <script>
        function showPopupBox() {
            document.getElementById("popup-box").style.display = "block";
            document.getElementById("overlay").style.display = 'block';
        }
        function hidePopupBox() {
            document.getElementById("popup-box").style.display = "none";
            document.getElementById("overlay").style.display = 'none';
        }
    </script>

</head>
<body>
    @auth
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mx-5">
                        <li style="margin-left: 50px">
                        <a class="nav-link text-light btn" href="{{ route('pirkumi')}}">{{__('Pirkumi')}}</a>
                        </li>
                        <li style="margin-left: 10px">
                        <a class="nav-link text-light btn" href="{{ route('productsinfo')}}">{{__('Produkti')}}</a>
                        </li>
                        <li style="margin-left: 10px">
                        <a class="nav-link text-light btn" href="{{ route('totalcount')}}">{{__('Kopsavilkums')}}</a>
                        </li>
                    </ul>
                    <!-- Middle Of Navbar -->
                    <ul class="navbar-nav mx-auto col-2">
                        <h6 class="text-light" style="margin-top: 10px">Budžeta sistēma!</h6>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto mx-5">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <div class="dropdown">
                                      <a style="margin-right: 50px" class="btn btn-dark btn-outline-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         {{ Auth::user()->name }}
                                      </a>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Profils</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                        </a>
                                      </div>
                                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                           @csrf
                                           </form>
                            </div>
                        @endguest
                   </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @else

    @endauth
</body>
</html>
