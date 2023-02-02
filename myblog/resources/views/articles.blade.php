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
  
<div class="row">
    @foreach($data->chunk(100) as $chunk)
        @foreach($chunk as $article)
        <div class="col-4">
            <div class="card" style="width: 18rem; margin-top: 20px;">
                <div class="card-body">
                  <h5 class="card-title">{{ $article->title }}</h5>
                  <p class="card-text">{{ substr($article->content, 0, 50) }}...</p>
                  <a href="{{ route('article.show', $article->id) }}" class="card-link">Afficher</a>
                  <a href="{{ route('article.edit', $article->id) }}" class="card-link">Modifier</a>
                  <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning" type="submit">Delete</button>
                </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
    </div>
    
<div class="text-center">
  <a href="{{ route('article.create') }}">Create a new Article</a>
</div>
{{ $data->links('vendor.pagination.simple-bootstrap-4') }}

<div class="text-center pagination">
  Page {{ $data->currentPage() }} of {{ $data->lastPage() }}
</div>
