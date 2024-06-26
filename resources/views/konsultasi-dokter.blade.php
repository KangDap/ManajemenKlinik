<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RodazaClinic">
    <meta name="keywords" content="Klinik, Kesehatan, Dokter, Medis, Mental">
    <meta name="author" content="Rodaza">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleKonsultasiDokter.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href={{ asset('assets/img//logo/logo.png') }} type="icon">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/dd20ffdac4.js" crossorigin="anonymous"></script>
    <title>Rodaza Clinic : Konsultasikan Keluhan Anda!</title>

</head>

<body>
    <!-- NAVIGATION BAR START-->
    <header class="wrapper">
        <div class="brand">
            <div class="firstname">
                <a href="/dashboard">Rodaza</a>
            </div>
            <div class="lastname">
                <a href="/dashboard">Clinic</a>
            </div>
        </div>
        <div class="brand-logo">
            <a href="/dashboard"><img src="assets/img/logo/logo.png"></a>
            <a href="#" id="hamburger"><i class="fa-solid fa-bars"></i></a>
        </div>
        <ul class="navigation">
            <li><a href="/dashboard#home" class="beranda-active">Beranda</a></li>
            <li><a href="/dashboard#about" class="about-active">Tentang Kami</a></li>
            <li><a href="/dashboard#doctor" class="doctor-active">Dokter</a></li>
            <li><a href="/dashboard#medis" class="medis-active">Informasi Medis</a></li>
            <li><a href="/konsultasi" id="konsul">Konsultasi</a></li>
        </ul>
        <ul class="navigation-mobile">
            <li><a href="/dashboard#home" class="beranda-active">Beranda</a></li>
            <li><a href="/dashboard#about" class="about-active">Tentang Kami</a></li>
            <li><a href="/dashboard#doctor" class="doctor-active">Dokter</a></li>
            <li><a href="/dashboard#medis" class="medis-active">Informasi Medis</a></li>
            @auth
            <li><a href="/dashboard#home" style="color: rgb(76, 142, 255)">{{"Dr. " . $nama}}</a></li>
            @else
            <li><a href="/login" class="medis-active">Login</a></li>
            @endauth
        </ul>
        <div class="garis"></div>
        @auth
        <div class="login">
            <p>Selamat Datang</p>
            <h3 onclick="toggleMenu()">{{"Dr. " . explode(' ', $nama)[0]}}</h3>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <h2>{{"Dr. " . $nama}}</h2>
                </div>
                <hr>
                <a href="/dashboard" class="sub-menu-links" id="sub1">
                    <i class="sub-menu-icon fa-solid fa-house"></i>
                    <p>Beranda</p>
                    <span>></span>
                </a>
                <a href="#" class="sub-menu-links" id="sub2">
                    <i class="sub-menu-icon fa-regular fa-envelope"></i>
                    <p>Bantuan</p>
                    <span id="ssub2">></span>
                </a>
                <a href="#" class="sub-menu-links" id="sub3">
                    <i class="sub-menu-icon fa-solid fa-gear"></i>
                    <p>Pengaturan</p>
                    <span id="ssub3">></span>
                </a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="sub-menu-links" id="sub4">
                        <i class="sub-menu-icon fa-solid fa-door-open"></i>
                        <p>Logout</p>
                        <span>></span>
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="login">
            <p>Selamat Datang</p>
            <a href="/login">Login</a>
        </div>
        @endauth
    </header>
    <!-- NAVIGATION BAR END -->

    <!-- SECTION SEARCH BAR START -->
    <section class="search-bar" id="search-bar">
        <main class="content">
            <div class="search-wrap">
                <form action="/konsultasi">
                    <div class="search">
                        <i class="search-icon fa-solid fa-magnifying-glass"></i>
                        <input type="search" class="search-input" placeholder="Cari Data Konsultasi..." name="search" value="{{request('search')}}">
                    </div>
                </form>
            </div>
        </main>
    </section>
    <!-- SECTION SEARCH BAR END -->

    @if (session()->has('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- SECTION TABEL START -->
    <section class="table" id="table">
        <main class="content">
            <div class="table-wrap">
                <table class="info-table">
                    <h1>Data Konsultasi Pasien</h1>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No. Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($list_konsultasi as $konsultasi)
                    <tbody>
                        <tr>
                            <td>{{$konsultasi->id}}</td>
                            <td>{{$konsultasi->ruangan->id}}</td>
                            <td>{{$konsultasi->pasien->nama}}</td>
                            <td>{{ "Dr. " . $konsultasi->dokter->nama}}</td>
                            <td>{{$konsultasi->formattedDate()}}</td>
                            <td>{{$konsultasi->formattedTime()}}</td>
                            <td>{!! nl2br(e($konsultasi->catatan)) !!}</td>
                            <td class="status {{ $konsultasi->status == 'Diterima' ? 'status-diterima' : ($konsultasi->status == 'Ditolak' ? 'status-ditolak' : 'status-menunggu') }}">{{$konsultasi->status}}</td>
                            <td>
                                @if ($konsultasi->status == 'Menunggu')
                                <form action="{{ route('konsultasi.changeStatus', $konsultasi->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="Diterima">
                                    <button type="submit" class="aksi-terima">Terima</button>
                                </form>
                                <form action="{{ route('konsultasi.changeStatus', $konsultasi->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="Ditolak">
                                    <button type="submit" class="aksi-tolak">Tolak</button>
                                </form>
                                <a href="/konsultasi/{{$konsultasi->id}}" class="aksi-edit">Edit</a>
                                @else
                                <a href="/konsultasi/{{$konsultasi->id}}" class="aksi-edit">Edit</a>
                                @endif
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </main>
    </section>
    <!-- SECTION TABEL END -->

    <!-- FOOTER START -->
    <footer>
        <div class="socials">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        </div>

        <div class="links">
            <a href="/dashboard">Beranda</a>
            <a href="/dashboard#about">Tentang Kami</a>
            <a href="/dashboard#doctor">Dokter</a>
            <a href="/dashboard#medis">Informasi Medis</a>
        </div>

        <div class="credit">
            <p>CreatedBy <a href="">RoDaZa</a> | &copy; 2024. All Right Reserved.
            </p>
        </div>
    </footer>
    <!-- FOOTER END -->
</body>

</html>
