<!DOCTYPE html>
<html>
<head>
    <link href="\assets\bootstrap.css" rel="stylesheet">
<style>
    .container {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Bienvenue sur la page d'accueil</h1>
    <div class="text-center">
      <button type="button" class="btn btn-outline-primary">
        <a class="nav-link" href="{{ url('/bisat') }}">Article</a>
      </button>
    </div>
    @if (!Auth::check())
      <div class="text-center" style="margin-top: 20px;">
        <button type="button" class="btn btn-primary">
          <a class="nav-link" href="{{ url('login') }}">Veuillez vous connecter pour continuer</a>
        </button>
      </div>
    @endif
    @if (Auth::check())
      <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <div class="text-center">
          <button type="submit" class="btn btn-danger">Merci pour votre visite</button>
        </div>
      </form>
    @endif
  </div>
</body>
</html>