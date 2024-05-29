<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        @auth
        <a class="navbar-brand" href="/dashboard">RoDaZa Clinic</a>
        @else
        <a class="navbar-brand" href="/">RoDaZa Clinic</a>
        @endauth
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item">
              <a class="nav-link {{($title === "Home") ? "active" : ''}}" aria-current="page" href="/dashboard">Home</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link {{($title === "Home") ? "active" : ''}}" aria-current="page" href="/">Home</a>
            </li>
            @endauth
          <li class="nav-item">
            <a class="nav-link {{($title === "About") ? "active" : ''}}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{($title === "Dokter") ? "active" : ''}}" href="/dokter">Doctor</a>
          </li>
          @auth
          <li class="nav-item">
              <a class="nav-link {{($title === "Konsultasi") ? "active" : ''}}" aria-current="page" href="dashboard/konsultasi">Konsultasi</a>
          </li>
          @endauth
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome Back, {{auth()->user()->pasien->nama}}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard/konsultasi">Konsultasi Saya</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item" href="#">Logout</button>
                    </form>
                </ul>
              </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{($title === "Login") ? "active" : ''}}" href="/login" >Login</a>
            </li>
            @endauth
        </ul>

      </div>
    </div>
  </nav>
