<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      {{-- navigation bar start --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container">
    <a class="navbar-brand text-white" href="{{ route('home')}}">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item me-5">
          <a class="nav-link text-white " href="{{ route('article#index') }}">Articles</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link text-white" href="#">About</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link text-white" href="#">Contact</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link text-white" href="{{ url('register') }}">Register</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link text-white" href="{{ url('login') }}">Login</a>
        </li>
        @auth
          <li class="nav-item me-5">
          <a class="nav-link text-white" href="{{ url('register') }}">Logout</a>
        </li>
        @endauth
       
    </div>
  </div>
</nav>
      {{-- navigation bar end --}}
    <div class="container my-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>