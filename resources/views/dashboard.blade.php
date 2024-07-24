<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="/images/logo.png" alt="BootstrapBrain Logo" width="200">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              @if(auth()->check())
                <li class="nav-item ms-3">
                  <a class="btn btn-primary" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              @else
                <li class="nav-item ms-3">
                  <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        @if(session('success'))
          <div class="alert alert-success" role="alert"> 
            {{ session('success') }}
          </div>
        @endif

        @if(auth()->check())
          <h1 class="display-7 fw-bold">Halo, {{ auth()->user()->name }}</h1>
          <p class="col-md-8 fs-4">Selamat datang di dashboard</p>
          <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg" role="button">Data Produk</a>
        @else
          <h1 class="display-5 fw-bold">Selamat Datang</h1>
          <p class="col-md-8 fs-4">Silakan login untuk mengakses dashboard.</p>
        @endif
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
