@extends('rentalskuy/layouts/master')

@section('content')

    <main class="l-main">
        <!--========== HOME ==========-->
        <section class="home" id="home">
            <div class="home__container bd-container bd-grid">
                <div class="home__img">
                    <img src="assets/img/lorem1.png" alt="">
                </div>

                <div class="home__data">
                    <h1 class="home__title">Rental mobil?Rentalskuy!</h1>
                    <p class="home__description">Nikmati perjalanan Anda dengan rental mobil kami!, Sewa mobil dengan harga terjangkau dan pelayanan terbaik!</p>
                    @if (session('login'))
                        <a class="button">Selamat Datang {{ session('nama_user') }}</a>
                    @else
                        <a href="/login" class="button">Login</a>
                    @endif
                </div>
            </div>
        </section>

        <!--========== SHARE ==========-->
        <section class="share section bd-container" id="share">
            <div class="share__container bd-grid">
                <div class="share__data">
                    <h2 class="section-title-center">Tentang Kami</h2>
                    <p class="share__description">Selamat datang di Rentalskuy, tempat Anda dapat menyewa mobil impian Anda dengan harga yang terjangkau. Kami menawarkan berbagai pilihan mobil, mulai dari mobil keluarga hingga mobil mewah.</p>
                </div>

                <div class="share__img">
                    <img src="assets/img/lorem2.png" alt="">
                </div>
            </div>
        </section>

        <!--========== DECORATION ==========-->
        <section class="decoration section bd-container" id="decoration">
            <h2 class="section-title">Kategori Mobil</h2>
            <div class="decoration__container bd-grid">
                <div class="decoration__data">
                    <img src="assets/img/dailycar/d1.png" style="height: 150px" class="decoration__img">
                    <h3 class="decoration__title">Daily Car</h3>
                    <a href="/dailycar" class="button button-link">Go Rental</a>
                </div>

                <div class="decoration__data">
                    <img src="assets/img/familycar/f5.jpg" style="height: 150px" class="decoration__img">
                    <h3 class="decoration__title">Family Car</h3>
                    <a href="/familycar" class="button button-link">Go Rental</a>
                </div>

                <div class="decoration__data">
                    <img src="assets/img/sportcar/s6.png" style="height: 150px" class="decoration__img">
                    <h3 class="decoration__title">Sport Car</h3>
                    <a href="/sportcar" class="button button-link">Go Rental</a>
                </div>

            </div>
        </section>

        <!--========== ACCESSORIES ==========-->
        <section class="accessory section bd-container" id="accessory">
            <h2 class="section-title">Anggota Kelompok</h2>

            <div class="accessory__container bd-grid">
                <div class="accessory__content">
                    <img src="assets/img/profil/reza.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">Taufiqu Reza Yoga Pratama </h3>
                    <span class="accessory__category">Desain Database & Usecase</span>
                </div>

                <div class="accessory__content">
                    <img src="assets/img/profil/rizki.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">Rizki Ardian Samudra</h3>
                    <span class="accessory__category">Backend</span>
                </div>

                <div class="accessory__content">
                    <img src="assets/img/profil/sahrul.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">Okhi Sahrul Barkah</h3>
                    <span class="accessory__category">UI/UX desainer</span>
                </div>

                <div class="accessory__content">
                    <img src="assets/img/profil/hamam.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">Hamam Mubarok Al Hadad</h3>
                    <span class="accessory__category">UI/UX desainer</span>
                </div>

                <div class="accessory__content">
                    <img src="assets/img/profil/farid.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">Farid Ghozali</h3>
                    <span class="accessory__category">UI/UX desainer</span>
                </div>

                <div class="accessory__content">
                    <img src="assets/img/profil/hilmi.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">M. Hilmi Fajrul Alam</h3>
                    <span class="accessory__category">Frontend</span>
                </div>

                <div class="accessory__content" style="position: relative; left: 110%">
                    <img src="assets/img/profil/oki.jpg" style="height: 200px" class="accessory__img">
                    <h3 class="accessory__title">Oki Bagus Rahmat Prakoso</h3>
                    <span class="accessory__category">Frontend</span>
                </div>
            </div>
        </section>

        <!--========== SEND GIFT ==========-->
        <section class="send section">
            <div class="send__container bd-container bd-grid">
                <div class="send__content">
                    <h2 class="section-title-center send__title">Kontak Kami</h2>
                    <p class="send__description">Silahkan hubungi kami & jangan sungkan</p>
                    <form action="">
                        <div class="send__direction">
                            <input type="text" placeholder="kontak kami" class="send__input">
                            <a href="#" class="button">Send</a>
                        </div>
                    </form>
                </div>

                <div class="send__img">
                    <img src="assets/img/lorem2.png" alt="">
                </div>
            </div>
        </section>
    </main>

@endsection
