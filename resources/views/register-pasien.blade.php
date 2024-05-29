<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RodazaClinic">
    <meta name="keywords" content="Klinik, Kesehatan, Dokter, Medis, Mental">
    <meta name="author" content="Rodaza">
    <link rel="stylesheet" href="{{ asset('css/register_page.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="fonts/SparkyStonesRegular-BW6ld.ttf">
    <link rel="icon" href={{asset("assets/img/logo.png")}} type="icon">
    <script src="scripts/script.js" defer></script>
    <script src="https://kit.fontawesome.com/dd20ffdac4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Rodaza Clinic | {{$title}}</title>

</head>

<body>
    <!-- NAVIGATION BAR START-->
    <header class="wrapper">
        <div class="brand">
            <div class="firstname">
                <a href="/">Rodaza</a>
            </div>
            <div class="lastname">
                <a href="/">Clinic</a>
            </div>
        </div>
        <div class="brand-logo">
            <a href="/"><img src={{asset("assets/img/logo.png")}}></a>
        </div>
        <ul class="navigation">
            <li><a href="/">Beranda</a></li>
            <li><a href="about">Tentang Kami</a></li>
            <li><a href="dokter">Dokter</a></li>
            <li><a href="info_medis">Informasi Medis</a></li>
        </ul>
        <div class="garis"></div>
        <div class="login">
            <p>Selamat Datang</p>
            <a href="login">Login</a>
        </div>
    </header>
    <!-- NAVIGATION BAR END -->
    <!-- SECTION HOME START -->
    <section class="hero" id="home">
        @if (session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <main class="content">
            <div class="input">
                <h1>REGISTER</h1>
                <form action="{{ route('registerPasien', ['user' => $user->id]) }}" method="POST">
                @csrf
                <div class="kotak_input">
                    <i class="fa-solid fa-person"></i>
                    <input type="varchar" name="nama" placeholder="Nama Lengkap">
                </div>
                @error('nama')
                    <div class="invalid-feedback">
                        {{'*' . $message}}
                      </div>
                @enderror
                <div class="kotak_input">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir">
                </div>
                @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        {{'*' . $message}}
                      </div>
                @enderror
                <div class="kotak_input">
                    <i class="fa-solid fa-road"></i>
                    <input type="varchar" name="alamat" placeholder="Alamat">
                </div>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{'*' . $message}}
                      </div>
                @enderror
                <div class="kotak_input">
                    <i class="fa-solid fa-phone"></i>
                    <input type="varchar" name="no_telepon" placeholder="Nomor Telepon">
                </div>
                @error('no_telepon')
                    <div class="invalid-feedback">
                        {{'*' . $message}}
                      </div>
                @enderror
                <button type="submit" class="input_btn">Register</button>
                <div class="bottom">
                    <p>Klik <a href="../login">di sini</a> apabila Anda sudah memiliki akun!</p>
                </div>
            </div>
        </form>
        </main>
    </section>
    <!-- SECTION HOME END -->

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
            <a href="index.html#home">Beranda</a>
            <a href="index.html#about">Tentang Kami</a>
            <a href="index.html#doctor">Dokter</a>
            <a href="index.html#medis">Informasi Medis</a>
        </div>

        <div class="credit">
            <p>CreatedBy <a href="">RoDaZa</a> | &copy; 2024. All Right Reserved.
            </p>
        </div>
    </footer>
    <!-- FOOTER END -->
</body>

</html>
