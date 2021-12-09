<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="{{asset('css/inicial/inicial.css')}}"> -->
</head>
<body>
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"></a>

                        @if (Route::has('register'))
                        <div class="login"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><img src="{{asset('img/inicial/user.png')}}"></a></div>
                        @endif
                    @endauth
                </div>
    @endif
    <h1> AllCourtMap </h1>

    <!-- <div class="barra">
        <picture>
            <img src="{{asset('img/inicial/barra_pesquisa.png')}}">
        </picture>
    </div> -->
    @yield("conteudo")



</body>
</html>