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
    <link rel="stylesheet" href="{{ asset('css/styleDokter.css') }}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        </div>
        <ul class="navigation">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#doctor">Dokter</a></li>
            <li><a href="#medis">Informasi Medis</a></li>
            <li><a href="/konsultasi">Konsultasi</a></li>
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
    <!-- SECTION HOME START -->
    <section class="hero" id="home">
        <main class="content">
            <h1 class="animate__animated animate__backInDown">Rodaza<span class="animate__animated animate__backInDown">C</span>linic</h1>
            <p>Konsultasikan keluhan Anda kepada dokter-dokter terbaik kami!</p>
            <a href="/konsultasi" class="cta">Konsultasi Sekarang!</a>
            <img src="assets/img/dashboard/doctor_1.jpg" class="doctor_main">
        </main>
    </section>
    <!-- SECTION HOME END -->

    <!-- SECTION ABOUT START -->
    <section class="about" id="about">
        <main class="content">
            <h2>Tentang &nbsp; <span>Kami</span></h2>
            <div class="box_1">
                <p>RodazaClinic adalah klinik yang didirikan pada tahun 2012 oleh tiga individu yang memiliki visi yang
                    sama untuk menyediakan layanan kesehatan berkualitas tinggi kepada masyarakat. Dengan dedikasi dan
                    komitmen kami terhadap pelayanan yang personal dan profesional, kami telah menjadi salah satu
                    destinasi utama untuk perawatan kesehatan di kawasan ini.</p>
                <div class="min-box1">
                    VISI
                    <div class="tooltip1">
                        Visi kami adalah untuk menjadi pusat kesehatan terdepan yang memberikan pelayanan yang inovatif,
                        holistik, dan terjangkau kepada setiap pasien. Kami berkomitmen untuk menciptakan lingkungan
                        yang ramah dan aman, di mana setiap individu merasa didengar, dihargai, dan dirawat dengan penuh
                        perhatian.
                    </div>
                </div>
            </div>
            <div class="box_2">
                <p>Dengan dukungan dari teknologi terkini dan tenaga medis yang berpengalaman, kami berupaya untuk
                    memberikan pelayanan yang berkualitas dan efisien. Kami memahami bahwa setiap pasien memiliki
                    kebutuhan unik, oleh karena itu, kami berusaha untuk memberikan perawatan yang disesuaikan dengan
                    kebutuhan dan preferensi individu.</p>
                <div class="min-box2">
                    MISI
                    <div class="tooltip2">
                        Misi kami adalah untuk memberikan perawatan kesehatan yang komprehensif dan berkualitas tinggi
                        melalui pendekatan yang holistik dan berbasis bukti. Kami terus berusaha untuk meningkatkan
                        standar layanan kami melalui pendidikan terus-menerus, teknologi terkini, dan kolaborasi dengan
                        para ahli kesehatan terkemuka.
                    </div>
                </div>
            </div>
        </main>
    </section>
    <!-- SECTION ABOUT END -->

    <!-- SECTION DOCTOR START -->
    <section class="doctor" id="doctor">
        <main class="content">
            <h1><span>DOKTER</span> &nbsp;KAMI</h1>
            <h2>Kami menawarkan 10 dokter terbaik untuk konsultasi Anda!</h2>
            <div class="slider">
                <button id="prev-slide" class="slide-button material-symbols-outlined">chevron_left</button>
                <div class="image-list">
                    <div class="image-item" id="image1">
                        <a href="#doc-asep-injeksi"><img src="assets/img/list-dokter/asep-injeksi.png" alt="img-1" id="foto1"></a>
                    </div>
                    <div class="image-item" id="image2">
                        <a href="#doc-dadang-turbo"><img src="assets/img/list-dokter/dadang-turbo.png" alt="img-2" id="foto2"></a>
                    </div>
                    <div class="image-item" id="image3">
                        <a href="#doc-firman-spakbor"><img src="assets/img/list-dokter/firman-spakbor.png" alt="img-3" id="foto3"></a>
                    </div>
                    <div class="image-item" id="image4">
                        <a href="#doc-lina-klakson"><img src="assets/img/list-dokter/lina-klakson.png" alt="img-4" id="foto4"></a>
                    </div>
                    <div class="image-item" id="image5">
                        <a href="#doc-sinta-knalpot"><img src="assets/img/list-dokter/sinta-knalpot.png" alt="img-5" id="foto5"></a>
                    </div>
                    <div class="image-item" id="image6">
                        <a href="#doc-ucup-remot"><img src="assets/img/list-dokter/ucup-remot.png" alt="img-6" id="foto6"></a>
                    </div>
                    <div class="image-item" id="image7">
                        <a href="#doc-dafa-bohlam"><img src="assets/img/list-dokter/dafa-bohlam.png" alt="img-7" id="foto7"></a>
                    </div>
                    <div class="image-item" id="image8">
                        <a href="#doc-joni-kabel"><img src="assets/img/list-dokter/joni-kabel.png" alt="img-8" id="foto8"></a>
                    </div>
                    <div class="image-item" id="image9">
                        <a href="#doc-riri-baskom"><img src="assets/img/list-dokter/riri-baskom.png" alt="img-9" id="foto9"></a>
                    </div>
                    <div class="image-item" id="image10">
                        <a href="#doc-tuti-ember"><img src="assets/img/list-dokter/tuti-ember.png" alt="img-10" id="foto10"></a>
                    </div>
                </div>
                <button id="next-slide" class="slide-button material-symbols-outlined">chevron_right</button>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </main>
    </section>
    <!-- SECTION DOCTOR END -->

    <!-- SECTION GARIS BIRU START -->
    <section class="garisBiru" id="garisBiru">
        <h1>Rodaza<span>C</span>linic</h1>
        <img src="assets/img/logo/logo.png" class="logoDiGaris">
    </section>
    <!-- SECTION GARIS BIRU END -->

    <!-- SECTION EDUKASI MEDIS START -->
    <section class="medis" id="medis">
        <main class="content">
            <h1>Informasi Medis</h1>
            <h2>Kami menyediakan informasi-informasi tentang kesehatan untuk Anda!</h2>

            <div class="artikel_container">
                <div class="artikel" id="artikel1">
                    <a href="#popup1">
                        <img src="assets/img/edukasi-kesehatan/1.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Pentingnya Pencegahan Penyakit</h6>
                            <p class="artikel-text">Fokus pada pola hidup sehat, imunisasi, dan skrining berkala untuk
                                mencegah penyakit.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup2">
                        <img src="assets/img/edukasi-kesehatan/2.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Manajemen Stres dan Kesehatan Mental</h6>
                            <p class="artikel-text">Mengenali tanda-tanda stres, strategi mengelola stres, dan
                                pentingnya
                                perawatan kesehatan mental.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup3">
                        <img src="assets/img/edukasi-kesehatan/3.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Kebutuhan Gizi dan Diet Seimbang</h6>
                            <p class="artikel-text">Edukasi tentang pentingnya asupan nutrisi yang tepat dan diet
                                seimbang
                                untuk menjaga kesehatan.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel" id="artikel4">
                    <a href="#popup4">
                        <img src="assets/img/edukasi-kesehatan/4.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Pemahaman tentang Penyakit Kronis</h6>
                            <p class="artikel-text">Informasi tentang penyakit seperti diabetes, hipertensi, dan
                                kolesterol
                                tinggi, termasuk pengelolaan dan pencegahan komplikasi.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup5">
                        <img src="assets/img/edukasi-kesehatan/5.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Perawatan Anak</h6>
                            <p class="artikel-text">Panduan bagi orang tua tentang perawatan bayi dan anak, termasuk
                                imunisasi, nutrisi, dan kesehatan anak.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup6">
                        <img src="assets/img/edukasi-kesehatan/6.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Pendidikan Kesehatan Reproduksi</h6>
                            <p class="artikel-text">Mengenai kesehatan reproduksi, kontrasepsi, infertilitas, dan
                                perawatan
                                prenatal.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel" id="artikel7">
                    <a href="#popup7">
                        <img src="assets/img/edukasi-kesehatan/7.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Bahaya Merokok dan Cara Berhenti</h6>
                            <p class="artikel-text">Informasi tentang dampak merokok pada kesehatan dan strategi untuk
                                berhenti merokok.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup8">
                        <img src="assets/img/edukasi-kesehatan/8.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Kesehatan Jantung dan Olahraga</h6>
                            <p class="artikel-text">Pentingnya aktivitas fisik dalam menjaga kesehatan jantung dan
                                strategi
                                untuk memulai program olahraga yang aman.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup9">
                        <img src="assets/img/edukasi-kesehatan/9.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Pencegahan Cedera dan Perawatan Pertolongan Pertama</h6>
                            <p class="artikel-text">Pengetahuan dasar tentang cara mencegah
                                cedera sehari-hari dan memberikan pertolongan pertama dalam situasi darurat.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel" id="artikel10">
                    <a href="#popup10">
                        <img src="assets/img/edukasi-kesehatan/10.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Perawatan Gigi dan Mulut yang Baik</h6>
                            <p class="artikel-text">Pentingnya kebersihan mulut, pencegahan penyakit gigi, dan perawatan
                                gigi reguler untuk menjaga kesehatan mulut dan gigi.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup11">
                        <img src="assets/img/edukasi-kesehatan/11.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Kesehatan Tulang dan Sendi</h6>
                            <p class="artikel-text">Informasi tentang pentingnya perawatan tulang dan sendi untuk
                                mengurangi
                                risiko osteoporosis, arthritis, dan cedera tulang.</p>
                        </div>
                    </a>
                </div>
                <div class="artikel">
                    <a href="#popup12">
                        <img src="assets/img/edukasi-kesehatan/12.jpg" alt="">
                        <div class="artikel-body">
                            <h6 class="artikel-judul">Kesehatan Mata dan Perawatan Penglihatan</h6>
                            <p class="artikel-text">Edukasi tentang pentingnya pemeriksaan mata rutin, perlindungan mata
                                dari sinar UV, dan perawatan umum untuk menjaga kesehatan mata.</p>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </section>
    <!-- SECTION EDUKASI MEDIS END -->

    <!-- SECTION DOCTOR POPUP START -->
    @foreach ($list_dokter as $dokter)
    <div class="doctor-popup" id="doc-{{ $dokter->slug }}">
        <div class="doctor-popup-content">
            <div class="doctor-popup-image">
                <img src="assets/img/list-dokter/{{ $dokter->slug }}.png">
                <a href="#doctor" class="popup-close">&times;</a>
            </div>
            <div class="doctor-popup-info">
                <h1>Dr. {{$dokter->nama}}</h1>
                <ul>
                    <li>Spesialis {{$dokter->spesialis}}</li>
                    <li>{{$dokter->email}}</li>
                    <li>{{$dokter->no_telepon}}</li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    <!-- SECTION DOCTOR POPUP END -->

    <!-- SECTION POPUP START -->
    <div class="popup" id="popup1">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/1.jpg">
                <a href="#medis" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Pentingnya Pencegahan Penyakit</h1>
            </div>
            <div class="popup-text">
                <p>Kesehatan adalah aset berharga yang harus dijaga dengan baik. Salah satu cara terbaik untuk
                    melindungi kesehatan adalah dengan mencegah penyakit sebelum penyakit itu muncul. Penyuluhan tentang
                    pencegahan penyakit menjadi penting karena memberikan informasi dan edukasi kepada masyarakat
                    mengenai langkah-langkah yang dapat diambil untuk menjaga kesehatan.
                </p>
                <p>Pola hidup sehat adalah langkah pertama dan terpenting dalam mencegah penyakit. Ini mencakup
                    berbagai
                    aspek seperti nutrisi yang tepat, olahraga teratur, dan kebiasaan sehat lainnya. Mengonsumsi makanan
                    yang seimbang dengan cukup buah, sayur, protein, dan biji-bijian memastikan tubuh mendapatkan
                    nutrisi yang dibutuhkan untuk berfungsi dengan baik. Hindari makanan olahan yang tinggi gula dan
                    lemak jenuh, karena dapat meningkatkan risiko penyakit kronis seperti diabetes dan penyakit jantung.
                </p>
                <p>Imunisasi adalah salah satu metode pencegahan penyakit yang paling efektif dan efisien. Vaksin
                    bekerja dengan cara merangsang sistem kekebalan tubuh untuk melawan penyakit tertentu sebelum
                    penyakit tersebut bisa menyerang. Imunisasi tidak hanya melindungi individu yang divaksinasi, tetapi
                    juga membantu melindungi komunitas dengan menciptakan kekebalan kelompok.
                </p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup2">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/2.jpg">
                <a href="#medis" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Manajemen Stres dan Kesehatan Mental</h1>
            </div>
            <div class="popup-text">
                <p>Stres merupakan respons tubuh terhadap berbagai tekanan atau tuntutan yang dihadapi dalam kehidupan
                    sehari-hari. Meski stres adalah hal yang umum dan dapat terjadi pada siapa saja, mengenali
                    tanda-tanda stres serta mengelola stres dengan baik sangat penting untuk menjaga kesehatan mental
                    dan fisik.
                </p>
                <p>
                    Mengelola stres memerlukan pendekatan yang holistik, yang melibatkan
                    perubahan gaya hidup, teknik relaksasi, serta dukungan sosial. Beberapa strategi yang dapat
                    diterapkan antara lain: olahraga teratur, teknik relaksasi, manajemen waktu, dukungan sosial, tidur
                    yang cukup, dan menghindari kebiasaan yang tidak sehat.
                </p>
                <p>
                    Kesehatan mental sama pentingnya dengan kesehatan fisik. Mengabaikan kesehatan mental dapat
                    menyebabkan berbagai masalah serius seperti depresi, kecemasan, dan gangguan kesehatan lainnya.
                    Beberapa langkah penting untuk merawat kesehatan mental antara lain: bantuan profesional, resting
                    schedule, dan menjaga pola hidup.
                </p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup3">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/3.jpg">
                <a href="#medis" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Kebutuhan Gizi dan Diet Seimbang</h1>
            </div>
            <div class="popup-text">
                <p>Kesehatan yang optimal tidak bisa dicapai tanpa memperhatikan kebutuhan gizi dan diet seimbang. Tubuh
                    kita membutuhkan berbagai macam nutrisi untuk berfungsi dengan baik, termasuk karbohidrat, protein,
                    lemak, vitamin, dan mineral.
                </p>
                <p>Karbohidrat, protein, dan lemak adalah sumber energi utama bagi tubuh. Karbohidrat memberikan energi
                    cepat, sedangkan lemak dan protein menyediakan energi yang lebih bertahan lama. Protein juga penting
                    untuk pertumbuhan dan perbaikan jaringan tubuh. Vitamin dan mineral seperti vitamin C, vitamin E,
                    dan zinc penting untuk menjaga sistem kekebalan tubuh yang kuat.</p>
                <p>Diet seimbang mencakup berbagai jenis makanan dalam proporsi yang tepat untuk memastikan tubuh
                    mendapatkan semua nutrisi yang dibutuhkan. Prinsip dasar dari diet seimbang antara lain: variasi,
                    porsi yang tepat, kurangi gula dan garam, lemak sehat, dan hidrasi.</p>
                <p>Asupan nutrisi yang tepat dan diet seimbang adalah kunci untuk menjaga kesehatan tubuh secara
                    keseluruhan. Dengan memperhatikan variasi makanan, ukuran porsi, serta memilih makanan yang sehat,
                    kita dapat memenuhi kebutuhan gizi dan mencegah berbagai penyakit kronis.</p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup4">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/4.jpg">
                <a href="#artikel1" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Pemahaman tentang Penyakit Kronis</h1>
            </div>
            <div class="popup-text">
                <p>Penyakit kronis adalah kondisi kesehatan yang berlangsung lama dan umumnya berkembang secara
                    perlahan. Beberapa penyakit kronis yang sering ditemui adalah diabetes dan hipertensi. Memahami
                    penyakit-penyakit ini, cara mengelola, serta mencegah komplikasinya sangat penting
                    untuk menjaga kualitas hidup yang baik.
                </p>
                <p>Diabetes adalah kondisi di mana tubuh tidak dapat memproduksi atau menggunakan insulin secara
                    efektif, sehingga menyebabkan kadar gula darah tinggi. Ada dua tipe utama diabetes: tipe 1 dan tipe
                    2. Diabetes tipe 1 merupakan penyakit autoimun, di mana sistem kekebalan tubuh menyerang sel-sel
                    penghasil insulin di pankreas, dan biasanya muncul pada usia muda. Sementara itu, diabetes tipe 2
                    lebih umum dan sering terkait dengan obesitas serta gaya hidup tidak sehat, di mana tubuh menjadi
                    resisten terhadap insulin atau tidak cukup memproduksi insulin.</p>
                <p>Hipertensi atau tekanan darah tinggi adalah kondisi di mana tekanan darah terhadap dinding arteri
                    meningkat secara konsisten, yang bisa menyebabkan kerusakan jangka panjang pada jantung dan pembuluh
                    darah. Pengelolaan hipertensi melibatkan pemantauan tekanan darah secara rutin untuk memastikan
                    tekanan darah tetap dalam rentang normal. </p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup5">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/5.jpg">
                <a href="#artikel1" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Perawatan Anak</h1>
            </div>
            <div class="popup-text">
                <p>Merawat anak adalah tanggung jawab yang besar bagi setiap orang tua. Mulai dari memastikan kebutuhan
                    dasar seperti nutrisi dan kesehatan terpenuhi hingga memberikan dukungan untuk perkembangan dan
                    pertumbuhan mereka. Inilah mengapa penting untuk memahami panduan lengkap tentang perawatan bayi dan
                    anak, termasuk imunisasi, nutrisi, dan menjaga kesehatan mereka.
                </p>
                <p>Merawat anak membutuhkan perhatian yang berkelanjutan terhadap berbagai aspek kesehatan dan
                    perkembangan mereka. Dengan memberikan nutrisi yang tepat, mengikuti jadwal imunisasi yang
                    direkomendasikan, dan menjaga lingkungan yang aman, orang tua dapat membantu anak-anak mereka tumbuh
                    dan berkembang dengan baik. Selalu konsultasikan dengan dokter atau penyedia layanan kesehatan untuk
                    informasi yang lebih spesifik dan terkini tentang perawatan anak yang tepat.</p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup6">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/6.jpg">
                <a href="#artikel1" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Pendidikan Kesehata Reproduksi</h1>
            </div>
            <div class="popup-text">
                <p>Pendidikan kesehatan reproduksi adalah bagian penting dari perawatan kesehatan yang membantu individu
                    memahami tubuh mereka, mengelola konsekuensi dari keputusan seksual, dan merencanakan masa depan
                    mereka dengan bijak.
                </p>
                <p>Pendidikan kesehatan reproduksi memberikan pengetahuan dan pemahaman yang diperlukan untuk membuat
                    keputusan yang bijaksana tentang kesehatan seksual dan reproduksi. Ini juga membantu dalam mencegah
                    penyakit menular seksual (PMS) dan kehamilan yang tidak diinginkan, serta mempersiapkan individu
                    untuk masa depan yang sehat secara reproduksi.</p>
                <p>Kontrasepsi merupakan alat yang efektif untuk mengelola kehamilan dan mencegah penyebaran PMS.
                    Berbagai metode kontrasepsi, mulai dari pil KB hingga kondom, tersedia untuk memenuhi kebutuhan
                    beragam individu. Penting untuk memahami cara kerja dan efektivitas masing-masing metode, serta
                    berkonsultasi dengan profesional kesehatan untuk memilih yang sesuai.</p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup7">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/7.jpg">
                <a href="#artikel4" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Bahaya Merokok dan Cara Berhenti</h1>
            </div>
            <div class="popup-text">
                <p>Merokok bukan hanya kebiasaan buruk, tetapi juga aktivitas yang memiliki dampak serius pada kesehatan
                    Anda. Dampak merokok untuk kesehatan antara lain: penyakit jantung dan pembuluh darah, penyakit
                    paru-paru, kanker, dan masalah kesehatan lainnya.
                </p>
                <p>Meskipun tidak mudah, berhenti merokok adalah langkah penting untuk meningkatkan kesehatan dan
                    kualitas hidup Anda. Berikut beberapa strategi yang dapat membantu Anda: bulatkan tekad untuk
                    berhenti merokok, cari dukungan, gunakan terapi pengganti nikotin, dan hindari pemicu rokok.</p>
                <p>Merokok memiliki dampak yang serius pada kesehatan, tetapi berhenti merokok dapat meningkatkan
                    kesehatan dan kualitas hidup Anda secara signifikan. Dengan menggunakan strategi yang tepat dan
                    mendapatkan dukungan yang Anda butuhkan, Anda dapat mencapai kesuksesan dalam berhenti merokok dan
                    memulai perjalanan menuju hidup yang lebih sehat.</p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup8">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/8.jpg">
                <a href="#artikel4" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Kesehatan Jantung dan Olahraga</h1>
            </div>
            <div class="popup-text">
                <p>Kesehatan jantung merupakan aspek penting dari kesejahteraan secara keseluruhan. Penyakit jantung
                    tetap menjadi salah satu penyebab utama kematian di seluruh dunia. Salah satu cara paling efektif
                    untuk menjaga kesehatan jantung adalah melalui aktivitas fisik.
                </p>
                <p>Aktivitas fisik memiliki berbagai manfaat untuk kesehatan jantung. Olahraga teratur membantu
                    meningkatkan fungsi jantung dan sirkulasi darah. Dengan berolahraga, jantung dapat bekerja lebih
                    efisien, memompa darah dengan lebih sedikit usaha. Ini meningkatkan aliran darah ke seluruh tubuh,
                    memastikan pasokan oksigen dan nutrisi yang optimal ke sel-sel tubuh. Selain itu, olahraga membantu
                    mengontrol berat badan. Dengan membakar kalori melalui aktivitas fisik, kita dapat menjaga berat
                    badan ideal, yang sangat penting untuk mencegah tekanan berlebih pada jantung.</p>
                <p>Tekanan darah juga dapat dikendalikan dengan rutin berolahraga. Latihan aerobik seperti berjalan
                    cepat, berlari, atau berenang dapat membantu menurunkan tekanan darah dengan membuat pembuluh darah
                    lebih elastis dan memperlancar aliran darah. Kolesterol yang tinggi merupakan faktor risiko utama
                    penyakit jantung. Olahraga membantu menurunkan kadar kolesterol LDL (kolesterol jahat) dan
                    meningkatkan kadar kolesterol HDL (kolesterol baik), yang dapat mengurangi risiko penumpukan plak di
                    arteri.</p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup9">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/9.jpg">
                <a href="#artikel4" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Pencegahan Cederan dan Perawatan Pertolongan Pertama</h1>
            </div>
            <div class="popup-text">
                <p>Kesehatan dan keselamatan adalah prioritas utama dalam kehidupan sehari-hari. Mencegah cedera dan
                    mengetahui cara memberikan pertolongan pertama adalah keterampilan penting yang dapat menyelamatkan
                    nyawa dan mengurangi dampak negatif dari kecelakaan.
                </p>
                <p>Cedera dapat terjadi kapan saja dan di mana saja, baik di rumah, tempat kerja, maupun di tempat umum.
                    Untuk mengurangi risiko cedera, ada beberapa langkah pencegahan yang dapat dilakukan.</p>
                <p>Di rumah, penting untuk menjaga lingkungan yang aman. Pastikan lantai selalu bersih dan bebas dari
                    benda-benda yang dapat menyebabkan tersandung atau terjatuh. Gunakan alas yang tidak licin di area
                    kamar mandi dan dapur. Selain itu, periksa dan perbaiki segera jika ada peralatan rumah tangga yang
                    rusak atau berpotensi membahayakan.</p>
                <p>Di tempat kerja, ikuti semua prosedur keselamatan yang telah ditetapkan. Gunakan alat pelindung diri
                    yang sesuai dengan jenis pekerjaan yang dilakukan, seperti helm, sarung tangan, dan kacamata
                    pelindung. Pastikan area kerja selalu dalam kondisi rapi dan terorganisir untuk menghindari
                    kecelakaan.
                </p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup10">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/10.jpg">
                <a href="#artikel7" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Perawatan Gigi dan Mulut yang Baik</h1>
            </div>
            <div class="popup-text">
                <p>Kesehatan gigi dan mulut merupakan bagian penting dari kesehatan keseluruhan. Perawatan gigi dan
                    mulut yang baik tidak hanya membantu mencegah masalah seperti gigi berlubang dan penyakit gusi,
                    tetapi juga dapat meningkatkan kepercayaan diri dan kualitas hidup.
                </p>
                <p>Menyikat gigi adalah dasar dari perawatan gigi dan mulut yang baik. Idealnya, gigi harus disikat
                    setidaknya dua kali sehari, yaitu pada pagi hari setelah sarapan dan sebelum tidur malam. Gunakan
                    sikat gigi dengan bulu lembut dan pasta gigi yang mengandung fluoride. Fluoride membantu memperkuat
                    enamel gigi dan mencegah kerusakan gigi. Pastikan untuk menyikat seluruh permukaan gigi, termasuk
                    bagian depan, belakang, dan permukaan pengunyah, dengan gerakan melingkar dan lembut.</p>
                <p>
                    Kunjungan rutin ke dokter gigi setidaknya dua kali setahun sangat penting untuk menjaga kesehatan
                    gigi dan mulut. Dokter gigi dapat melakukan pembersihan profesional untuk menghilangkan plak dan
                    karang gigi yang tidak bisa dihilangkan dengan menyikat gigi biasa. Selain itu, pemeriksaan rutin
                    dapat mendeteksi masalah gigi dan mulut sejak dini, sehingga dapat diobati sebelum menjadi lebih
                    serius.
                </p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup11">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/11.jpg">
                <a href="#artikel7" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Kesehatan Tulang dan Sendi</h1>
            </div>
            <div class="popup-text">
                <p>Tulang dan sendi adalah fondasi utama tubuh manusia yang memungkinkan mobilitas dan dukungan
                    struktural. Pemahaman tentang pentingnya perawatan tulang dan sendi sangatlah vital, terutama dengan
                    meningkatnya umur populasi.
                </p>
                <p>Osteoporosis, kondisi di mana tulang menjadi rapuh dan rentan terhadap patah tulang, dan arthritis,
                    yang menyebabkan peradangan dan kekakuan sendi, adalah dua masalah kesehatan utama yang sering
                    terjadi.
                </p>
                <p>Pencegahan adalah kunci dalam mengatasi masalah ini, melalui konsumsi kalsium yang mencukupi, vitamin
                    D, dan latihan berat yang memperkuat tulang serta menjaga berat badan yang sehat. Perawatan yang
                    tepat waktu dan konsisten, termasuk diagnosis dini dan intervensi medis, juga sangat penting untuk
                    menjaga kesehatan tulang dan sendi yang optimal.
                </p>
            </div>
        </div>
    </div>

    <div class="popup" id="popup12">
        <div class="popup-content">
            <div class="popup-image">
                <img src="assets/img/edukasi-kesehatan/12.jpg">
                <a href="#artikel7" class="popup-close">&times;</a>
            </div>
            <div class="popup-judul">
                <h1>Kesehatan Mata dan Perawatan Mata</h1>
            </div>
            <div class="popup-text">
                <p> Mata adalah salah satu organ penting dalam tubuh yang memungkinkan kita untuk berinteraksi dengan
                    dunia sekitar. Untuk menjaga kesehatan mata yang optimal, penting untuk melakukan pemeriksaan mata
                    rutin setidaknya setahun sekali, terutama bagi mereka yang memiliki riwayat masalah penglihatan atau
                    faktor risiko tertentu.
                </p>
                <p>Selain itu, perlindungan mata dari paparan sinar UV juga penting untuk mencegah kerusakan mata
                    terkait usia, seperti katarak. Perawatan umum, seperti menjaga kebersihan mata, istirahat yang cukup
                    bagi mata dari paparan layar digital, dan konsumsi makanan yang kaya akan nutrisi penting untuk
                    mata, seperti beta karoten dan vitamin A, juga merupakan langkah-langkah yang dapat diambil untuk
                    menjaga kesehatan mata yang baik.</p>
            </div>
        </div>
    </div>
    <!-- SECTION POPUP END -->

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
            <a href="#home">Beranda</a>
            <a href="#about">Tentang Kami</a>
            <a href="#doctor">Dokter</a>
            <a href="#medis">Informasi Medis</a>
        </div>

        <div class="credit">
            <p>CreatedBy <a href="">RoDaZa</a> | &copy; 2024. All Right Reserved.
            </p>
        </div>
    </footer>
    <!-- FOOTER END -->
</body>

</html>
