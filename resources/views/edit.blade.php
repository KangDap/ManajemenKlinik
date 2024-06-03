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
    <link rel="stylesheet" href="{{ asset('css/formKonsultasi.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href={{ asset('assets/img//logo/logo.png') }} type="icon">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/dd20ffdac4.js" crossorigin="anonymous"></script>
    <title>Rodaza Clinic | {{$title}}</title>

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
            <a href="/dashboard"><img src={{ asset('assets/img//logo/logo.png') }}></a>
        </div>
        <ul class="navigation">
            <li><a href="/dashboard">Beranda</a></li>
            <li><a href="/dashboard#about">Tentang Kami</a></li>
            <li><a href="/dashboard#doctor">Dokter</a></li>
            <li><a href="/dashboard#medis">Informasi Medis</a></li>
        </ul>
        <div class="garis"></div>
        @auth
        <div class="login">
            <p>Selamat Datang</p>
            <h3 onclick="toggleMenu()">{{explode(' ', $nama)[0]}}</h3>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <h2>{{$nama}}</h2>
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

    @if (session()->has('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    <!-- SECTION HOME START -->
    <section class="hero" id="home">
        <main class="content">
            <div class="input">
                <h1>EDIT KONSULTASI</h1>
                <form action="/konsultasi/{{$konsultasi->id}}" method="POST">
                @method('put')
                @csrf
                <div class="kotak_input">
                    <i class="fa-solid fa-user-doctor"></i>
                    <select id="doctorSelect" name="id_dokter">
                        <option value="" disabled selected>Pilih Dokter
                            <hr>
                        </option>
                        @foreach ($list_dokter as  $dokter)
                            @if (old('dokter', $konsultasi->id_dokter) == $dokter->id_dokter)
                                <option value="{{$dokter->id_dokter}}" selected>Dr. {{$dokter->nama}}</option>
                            @else
                                <option value="{{$dokter->id_dokter}}">Dr. {{$dokter->nama}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="kotak_input">
                    <i class="fa-solid fa-door-closed"></i>
                    <select id="ruanganSelect" name="id_ruangan">
                        <option value="" disabled selected>Pilih Ruangan
                            <hr>
                        </option>
                        @foreach ($list_ruangan as $ruangan)
                            @if (old('ruangan', $konsultasi->id_ruangan) == $ruangan->id)
                                <option value="{{$ruangan->id}}" selected>{{$ruangan->id}} - {{$ruangan->jenis_ruangan}} Lantai {{$ruangan->lantai}}</option>
                            @else
                                <option value="{{$ruangan->id}}">{{$ruangan->id}} - {{$ruangan->jenis_ruangan}} Lantai {{$ruangan->lantai}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="kotak_input">
                    <i class="fa-solid fa-calendar-days"></i>
                    <input id="dateInput" type="text" placeholder="Tanggal Konsultasi" onfocus="(this.type='date')"
                        onblur="(this.type='text')" name="tanggal_konsul" value="{{old('tanggal_konsul', $konsultasi->tanggal_konsul)}}"/>
                </div>
                @error('tanggal_konsul')
                    <div class="text-danger">
                        {{'*' . "Mohon isi Tanggal Konsultasi"}}
                    </div>
                @enderror
                <div class="kotak_input">
                    <i class="fa-solid fa-clock"></i>
                    <input id="timeInput" type="text" placeholder="Jam Konsultasi" onfocus="(this.type='time')"
                        onblur="(this.type='text')" name="jam_konsul" value="{{old('jam_konsul', $konsultasi->jam_konsul)}}"/>
                </div>
                @error('jam_konsul')
                    <div class="text-danger">
                        {{'*' . "Mohon isi Jam Konsultasi"}}
                    </div>
                @enderror
                <div class="kotak_input">
                    <i class="fa-solid fa-envelope"></i>
                    <textarea class="text-area" placeholder="Masukkan Keluhan Anda" name="catatan">{{ old('catatan', $konsultasi->catatan) }}</textarea>
                </div>
                @error('catatan')
                    <div class="text-danger">
                        {{'*' . "Mohon isi Catatan"}}
                    </div>
                @enderror
                <button type="submit" name="login" class="input_btn">Edit Konsultasi</button>
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
