<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <style>
            /* Styles for the page container */
            body {
                background-color: #2d3748;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                background-color: #fff;
                width: 400px;
                height: 300px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .container h3 {
                font-size: 30px;
                margin-bottom: 20px;
                text-align: center;
            }

            button {
                display: inline-block;
                margin-right: 10px;
            }

        </style>
    </head>
    <body>
          <div class="container">
                        @if (Route::has('login'))
                                @auth
                                    <h3>Jūs jau esiet pieslēgušies!</h3>
                                    <a href="{{ url('/Pirkumi') }}" class="btn btn-primary">Atgriezties</a>
                                @else
                                @guest()
                                    <h3>Laipni lūgti, veiciet pieslēgšanos!</h3>
                                    <a href="{{ route('login') }}" class="btn btn-primary">Pieslēgšanās</a>
                                    <br>
                                    <h3>Neesiet reģistrēts?</h3>
                                    <a href="{{ route('register') }}" class="btn btn-primary">Reģistrēšanās</a>
                                @endguest
                                @endauth
                        @endif
           </div>
    </body>
</html>
