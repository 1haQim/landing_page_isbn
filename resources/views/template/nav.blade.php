<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('template/images/logo.png') }}" class="" alt="" style="width: 65%;">
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/panduan_layanan">Panduan Layanan</a>
                    <!-- <a class="nav-link " href="#" onclick="openModal(this)">Panduan Layanan</a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll text-center" href="/home#section_2">BIP/Surat/ <br>Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/home#section_3">Info</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/statistik">Statistik</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/detail_fnq">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll text-center" href="/pelacakan">Lacak Pengajuan</a>
                </li>
                
            </ul>

            <div class="d-none d-lg-block">
                <a href="{{config('app.penerbit')}}" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>
