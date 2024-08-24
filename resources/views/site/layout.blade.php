<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Senges - @yield('title')</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>

    <div>
        <nav class="grey darken-3">
            <div class="nav-wrapper container">
                <a href="{{ route('site.index') }}" class="brand-logo center ">Loja Senges</a>
                <ul id="nav-mobile" class="left">
                    <li><a href="{{ route('site.index') }}">Home</a></li>
                    <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Categoria <i
                                class="material-icons right">expand_more</i></a></li>
                    <li><a href="{{ route('site.carrinho') }}">Carrinho <span
                                class="new badge orange">{{ \Cart::getContent()->count() }}</span></a></li>
                </ul>
                @auth
                    <ul id="nav-mobile" class="right">
                        <li><a class='dropdown-trigger' href='#'
                                data-target='dropdown2'>{{ auth()->user()->firstName }}<i
                                    class="material-icons right">expand_more</i></a></li>
                    </ul>
                @else
                    <ul id="nav-mobile" class="right">
                        <li><a href="{{ route('login.form') }}">Login</a></li>
                    </ul>
                @endauth

            </div>
        </nav>
    </div>

    @yield('conteudo')


    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoria)
            <li class="grey darken-3"><a href="{{ route('site.categoria', $categoria->id) }}"
                    class="white-text">{{ $categoria->nome }}</a></li>
        @endforeach

    </ul>

    <ul id='dropdown2' class='dropdown-content'>
        <li class="grey darken-3"><a href="{{ route('admin.dashboard') }}" class="white-text">Dashboard</a></li>
        <li class="grey darken-3"><a href="{{ route('login.logout') }}" class="white-text">Logout</a></li>

    </ul>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {
                coverTrigger: false,
                constrainWidth: false
            });
        });
    </script>

</body>

</html>
