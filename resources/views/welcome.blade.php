<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
    <IMG SRC="TEST.JPEG">
       <div class="container">
            <div class="card text-center justify-content-center" style="width: 30%;">
                <div class="card-body">
                        @if (Route::has('login'))
                                @auth
                                    <h3>Laipni lūgti atpakaļ!</h3>
                                    <a href="{{ url('/home') }}" class="btn btn-primary">Atgriezties</a>
                                @else
                                    <h3>Veiciet pieslēgšanos!</h3>
                                    <a href="{{ route('login') }}" class="btn btn-primary">Pieslēgšanās</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-primary">Reģistrēšanās</a>
                                    @endif
                                @endauth
                        @endif
                </div>
            </div>
       </div>
    </body>
</html>
