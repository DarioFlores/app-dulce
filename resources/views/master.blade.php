<!doctype html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="AppWeb para facilitar el manejo de stock y precios de los productos que realizamos">
      <meta name="author" content="Dario Exequiel Flores">
      <link rel="icon" href="favicon.ico">

      <title>@yield('titulo')</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/starter-template.css" rel="stylesheet">
      <link href="css/album.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">

  </head>

  <body>
      <header>
          @include('navbar')
      </header>

      @yield('contenido')

      <footer class="text-muted">
          <div class="container">
              <p class="float-right">
                  <a href="#">Back to top</a>
              </p>
              <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
              <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
          </div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
