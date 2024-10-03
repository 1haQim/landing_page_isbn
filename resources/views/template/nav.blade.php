<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') git a}} ">
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
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"  href="{{ url('/home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('panduan_layanan') ? 'active' : '' }}" href="{{ url('panduan_layanan') }}">Panduan Layanan</a>
                    <!-- <a class="nav-link " href="#" onclick="openModal(this)">Panduan Layanan</a> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home#section_2') ? 'active' : '' }} click-scroll text-center" href="{{ url('home#section_2') }}">BIP/Surat/ <br>Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home#section_3') ? 'active' : '' }} click-scroll" href="{{ url('home#section_3') }}">Info</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('statistik') ? 'active' : '' }}" href="{{ url('statistik') }}">Statistik</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('detail_fnq') ? 'active' : '' }}" href="{{ url('detail_fnq') }}">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pelacakan') ? 'active' : '' }}" href="{{ url('pelacakan') }}">Lacak Pengajuan</a>
                </li>
                
            </ul>

            <div class="d-none d-lg-block">
                <a href="{{config('app.penerbit')}}" class="navbar-icon bi-person smoothscroll"></a>
            </div>
        </div>
    </div>
</nav>
