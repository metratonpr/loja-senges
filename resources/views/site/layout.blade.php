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
              <a href="#" class="brand-logo center ">Loja Senges</a>
              <ul id="nav-mobile" class="left">
                <li><a href="#">Home</a></li>
                <li><a href="#">Carrinho</a></li>

              </ul>
            </div>
          </nav>
    </div>

    @yield('conteudo')



    <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>