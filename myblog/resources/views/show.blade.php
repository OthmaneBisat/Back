<head>
    <link href="\assets\bootstrap.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/bisat') }}">Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/create') }}">Create a new Article</a>
        </li>
      </ul>
  
      @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
          @auth
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="text-center">
              <button type="submit" class="btn btn-danger">Deconnexion</button>
            </div>
          </form>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Log in</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
            @endif
          @endauth
        </ul>
      @endif
    </div>
  </nav>
<div>
    <h2>{{$data->title}}</h2>
    <p>{{$data->content}}</p>
</div>