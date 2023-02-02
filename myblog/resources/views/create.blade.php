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
<h1>Create Article</h1>

<form action="{{ route('article.store') }}" method="Post">
  @csrf

  <div>
    <label class="form-label mt-4" for="title">Title:</label>
    <input class="form-control" type="text" name="title" id="title" required>
  </div>

  <div>
    <label class="form-label mt-4" for="subtitle">Subtitle:</label>
    <input class="form-control" type="text" name="subtitle" id="subtitle" required>
  </div>

  <div>
    <label class="form-label mt-4" for="slug">Slug:</label>
    <input class="form-control" type="text" name="slug" id="slug" required>
  </div>

  <div>
    <label class="form-label mt-4" for="content">Content:</label>
    <textarea class="form-control" name="content" id="content" required></textarea>
  </div>

  <button type="submit">Save</button>
</form>
