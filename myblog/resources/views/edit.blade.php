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
<form action="{{ route('article.update', $data->id) }}" method="POST">
    
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
    </div>
  
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control" id="content" name="content">{{ $data->content }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  