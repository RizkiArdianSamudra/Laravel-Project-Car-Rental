<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <title>Rentalskuy</title>
</head>

<body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-up-arrow-alt scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">
                <img src="{{ asset('assets/img/rentalskuy.png') }}" style="width: 50%">
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="{{ url('/#home') }}" class="nav__link active-link">Home</a></li>
                    <li class="nav__item"><a href="{{ url('/#share') }}" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="{{ url('/#decoration') }}" class="nav__link">Kategori Mobil</a></li>
                    <li class="nav__item"><a href="{{ url('/#accessory') }}" class="nav__link">Anggota</a></li>
                    @if (session('login'))
                        <li class="nav__item"><a href="{{ url('/logout') }}" class="nav__link">Logout</a></li>
                    @endif

                    <li><i class='bx bx-toggle-left change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
        </nav>
    </header>


    @yield('content')


    <!--========== FOOTER ==========-->
    <footer class="footer section">
        <div class="footer__container bd-container bd-grid">
            <div class="footer__content">
                <h3 class="footer__title">
                    <a href="#" class="footer__logo">Rentalskuy</a>
                </h3>
                <p class="footer__description">Masuk</p>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Tentang Kami</h3>
                <ul>
                    <li><a href="#" class="footer__link">Sejarah Perusahaan</a></li>
                    {{-- <li><a href="#" class="footer__link">lorem</a></li>
                    <li><a href="#" class="footer__link">lorem</a></li> --}}
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Kategori Mobil</h3>
                <ul>
                    <li><a href="#" class="footer__link">Daily Car</a></li>
                    <li><a href="#" class="footer__link">Family Car</a></li>
                    <li><a href="#" class="footer__link">Sport Car</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Anggota</h3>
                <ul>
                    <li><a href="#" class="footer__link"></a>Rizki Ardian</li>
                    <li><a href="#" class="footer__link"></a>Reza Yoga</li>
                    <li><a href="#" class="footer__link"></a>Sahrul Barkah</li>
                    <li><a href="#" class="footer__link"></a>Oki Bagus</li>
                    <li><a href="#" class="footer__link"></a>Hilmi Fajrul</li>
                    <li><a href="#" class="footer__link"></a>Hamam Mubarok</li>
                    <li><a href="#" class="footer__link"></a>Farid Ghozali</li>
                </ul>
                {{-- <a href="#" class="footer__social"><i class='bx bxl-facebook-circle '></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-instagram-alt'></i></a> --}}
            </div>
        </div>
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>