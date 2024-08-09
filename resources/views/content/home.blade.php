@extends('index')

@section('content')



<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">ISBN</h1>

                <h6 class="text-white text-center">International Standard Book Number</h6>

                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">
                            
                        </span>

                        <input name="keyword" type="search" class="form-control" id="keyword_pencarian" placeholder="Cari Judul, Pengarang, Penerbit, ISBN ..." aria-label="Search">

                        <button type="submit" class="form-control">
                            <a class="nav-link click-scroll" href="" onclick="handleClickSearch()">Cari</a>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>


<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-3 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="topics-detail.html">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">Prosedur</h5>

                                <p class="mb-0">
                                    Informasi tentang Prosedur Pendaftaran Penerbit dan Permohonan ISBN
                                </p>
                            </div>
                            
                        </div>
                        <div>
                            <center>
                                <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Selengkapnya</a>
                            </center>
                        </div>
                        <img src="{{ asset('template/images/icon_1.png') }}" class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>

            <div class="col-lg-7 col-12">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{ asset('template/images/icon_7.png') }}" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">ISBN</h5>

                                <p class="text-white">
                                    ISBN (International Standard Book Number) adalah deretan angka 13 digit sebagai pemberi identifikasi unik secara internasional terhadap satu buku maupun produk seperti buku yang diterbitkan oleh penerbit. Setiap nomor memberikan identifikasi unik untuk setiap terbitan buku dari setiap penerbit, sehingga keunikan tersebut memungkinkan pemasaran produk yang 
                                    selengkapnya ...
                                </p>

                                <a href="{{ url('pendaftaran_online') }}" class="btn custom-btn mt-2 mt-lg-3">Daftar Online</a>
                            </div>
                        </div>

                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="explore-section section-padding" id="section_2">
    <div class="container">

            <div class="col-12 text-center">
                <h2 class="mb-4">Cari Topik Tentang</h1>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">ISBN</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">BIP</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-tab-pane" type="button" role="tab" aria-controls="finance-tab-pane" aria-selected="false">Berita</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane" type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Surat</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-tab-pane" type="button" role="tab" aria-controls="education-tab-pane" aria-selected="false">Statistik</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Informasi Seputar ISBN</h5>

                                                <p class="mb-0">
                                                    Ingin tahu lebih banyak tentang apa, bagaimana dan fungsi ISBN serta persyaratan untuk mendapatkannya?
                                                </p>
                                            </div>

                                            <!-- <span class="badge bg-design rounded-pill ms-auto">14</span> -->
                                        </div>
                                        <img src="{{ asset('template/images/topics/undraw_Remote_design_team_re_urdx.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Katalog Dalam Terbitan & BIP Online</h5>

                                                    <p class="mb-0">
                                                        KDT atau Katalog Dalam Terbitan adalah salah satu layanan untuk penerbit, ingin mengetahui selengkapnya?
                                                    </p>
                                            </div>

                                            <!-- <span class="badge bg-design rounded-pill ms-auto">75</span> -->
                                        </div>

                                        <img src="{{ asset('template/images/topics/undraw_Redesign_feedback_re_jvm0.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Prosedur Registrasi Penerbit & Daftar ISBN</h5>

                                                    <p class="mb-0">
                                                        Prosedur dan cara registrasi ISBN dan cara mengajukan permohonan ISBN, ingin mengetahui selengkapnya?
                                                    </p>
                                            </div>

                                            <!-- <span class="badge bg-design rounded-pill ms-auto">100</span> -->
                                        </div>

                                        <img src="{{ asset('template/images/topics/colleagues-working-cozy-office-medium-shot.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">BIP Online</h5>

                                            <p class="mb-0">Unduh Book In Print secara online</p>
                                        </div>
                                        <span class="badge rounded-pill ms-auto" id="totalRowsBip" style="background-color: #13547a;"></span>
                                    </div>

                                    <table id="doc_bip" class="display responsive nowrap" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><center>Judul</center></th>
                                                <th><center>Deskripsi</center></th>
                                                <th><center>Download</center></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="tab-pane fade" id="finance-tab-pane" role="tabpanel" aria-labelledby="finance-tab" tabindex="0">   <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Berita dari Salemba</h5>

                                                <p class="mb-0">
                                                    Layanan kembali normal
                                                    Diinformasikan bahwa Layanan ISBN Online sudah kembali normal. Penerbit yang masih belum bisa akses pada pendaftaran ISBN atau terkendala upload lampiran, silahkan lakukan clear cache terlebih dahulu. Salam sehat dan salam literasi
                                                </p>
                                            </div>

                                            <span class="badge rounded-pill" style="background-color: #13547a;width:100%">23.4.2024</span>
                                        </div>

                                        <img src="{{ asset('template/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">Berita dari Salemba</h5>

                                                <p class="mb-0">
                                                    Layanan kembali normal
                                                    Diinformasikan bahwa Layanan ISBN Online sudah kembali normal. Penerbit yang masih belum bisa akses pada pendaftaran ISBN atau terkendala upload lampiran, silahkan lakukan clear cache terlebih dahulu. Salam sehat dan salam literasi
                                                </p>
                                            </div>
                                            <span class="badge rounded-pill " style="background-color: #13547a; width:100%">23.4.2024</span>
                                        </div>

                                        <img src="{{ asset('template/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="music-tab-pane" role="tabpanel" aria-labelledby="music-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                                <div class="custom-block bg-white shadow-lg">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Dokumen atau Surat</h5>

                                            <p class="mb-0">Unduh dokumen-surat secara online</p>

                                        </div>
                                        <span class="badge rounded-pill ms-auto" id="totalRowsSurat" style="background-color: #13547a;"></span>
                                    </div>

                                    <table id="doc_surat" class="display responsive nowrap" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th><center>Judul </center></th>
                                                <th><center>Deskripsi</center></th>
                                                <th><center>Download</center></th>
                                            </tr>
                                        </thead>
                                    </table>
                                        <!-- <img src="images/topics/undraw_Compose_music_re_wpiw.png" class="custom-block-image img-fluid" alt=""> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab" tabindex="0">
                        <div class="row">
                            <!-- detail statistik singkat-->
                            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12" id="statistik_singkat">
                                <div class="custom-block bg-white shadow-lg">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Statistik</h5>

                                            <p class="mb-0">
                                                Informasi tentang penomoran Isbn dan data-data statistik per tahun, per bulan, per provinsi dan data lainnya <br> <br>
                                                <!-- <b> 1. Pendahuluan </b><br> -->
                                                Perpustakaan Nasional RI Sebagai badan yang ditunjuk oleh International ISBN Agency untuk mengelola International Standard Book Number (ISBN) di Indonesia sejak tahun 1986, telah menjalankan tugasnya mengelola dan mendistribusikan penomoran ISBN kepada seluruh penerbit yang ada di wilayah negara kesatuan Republik Indonesia.
                                            </p>
                                            <a href="detail_statistik.html" class="btn custom-btn mt-2 mt-lg-3" style="background-color: #13547a;">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end statistik panjang-->
                            <!-- detail statistik panjang-->
                            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12" id="statistik_lengkap" style="display: none;">
                                <div class="custom-block bg-white shadow-lg">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Statistik</h5>

                                            <p class="mb-0">
                                                Informasi tentang penomoran Isbn dan data-data statistik per tahun, per bulan, per provinsi dan data lainnya <br>
                                                <b> 1. Pendahuluan </b><br>
                                                Perpustakaan Nasional RI Sebagai badan yang ditunjuk oleh International ISBN Agency untuk mengelola International Standard Book Number (ISBN) di Indonesia sejak tahun 1986, telah menjalankan tugasnya mengelola dan mendistribusikan penomoran ISBN kepada seluruh penerbit yang ada di wilayah negara kesatuan Republik Indonesia.
                                                <br><br>
                                                Indonesia sudah tiga kali menerima Group Identifier, yaitu 979 pada tahun 1985, 602 pada tahun 2003 dan 623 pada tahun 2018. Berikut Struktur ISBN untuk Indonesia
                                            </p>
                                            <img src="{{ asset('template/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="">
                                            <p>
                                                Berdasarkan block number tersebut, Perpustakaan Nasional RI sudah mendistribusikan registrant element dan rentang ISBN, sebanyak :
                                            </p>
                                            <img src="{{ asset('template/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="">
                                            <p>
                                            Data ini menunjukkan bahwa penerbit Indonesia sudah menggunakan 13.510 registrant elemant pada group identifier 979, dan 24.607 registrant element pada group identifier 602. Sedangkan penggunaan registrant element pada block number 623 belum menjadi hitungan karena masih terus dikembangkan bersamaan dengan kondisi penerbitan di Indonesia. Jika diperhatikan, sejak diterapkannya sistem ISBN di Indonesia sejak tahun 1986, penerbit di Indonesia telah menerbitkan buku sebanyak 2.000.000 judul buku ber-ISBN (diluar hitungan buku berjilid) 
                                            <br>
                                            Layanan pengurusan ISBN Perpustakaan Nasional RI telah memenuhi persyaratan SNI ISO 9001 : 2015 dan terdaftar dalam MUTU Certification. Berdasarkan Surat edaran Kepala Direktorat Deposit Bahan Pustaka Perpustakaan Nasional RI no. 224/3.1/DBP.05/II.2018, berlaku mulai April 2018 layanan ISBN dinyatakan online dan tidak ada lagi pengajuan ISBN secara onsite. 
                                            <br>
                                            Perpustakaan Nasional RI berusaha menyediakan informasi hasil layanan ISBN secara terbuka dan real time. Layanan tersebut merupakan pertanggungjawaban lembaga dalam mewujudkan layanan publik yang transparan dan akuntabel.
                                            <br>
                                            </p>
                                            <!-- menu baru -->
                                            <div class="row">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="terbitan-tab" data-bs-toggle="tab" data-bs-target="#terbitan-tab-pane" type="button" role="tab" aria-controls="terbitan-tab-pane" aria-selected="true">Terbitan</button>
                                                    </li>

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="penerbit-tab" data-bs-toggle="tab" data-bs-target="#penerbit-tab-pane" type="button" role="tab" aria-controls="penerbit-tab-pane" aria-selected="false">Penerbit</button>
                                                    </li>

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="periode-isbn-tab" data-bs-toggle="tab" data-bs-target="#periode-isbn-tab-pane" type="button" role="tab" aria-controls="periode-isbn-tab-pane" aria-selected="false">ISBN per periode</button>
                                                    </li>

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="wilayah-isbn-tab" data-bs-toggle="tab" data-bs-target="#wilayah-isbn-tab-pane" type="button" role="tab" aria-controls="wilayah-isbn-tab-pane" aria-selected="false">ISBN per wilayah</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- konten detail statistik -->
                                            <div class="tab-content" id="myTabContent1">
                                                <div class="tab-pane fade show active" id="terbitan-tab-pane" role="tabpanel" aria-labelledby="terbitan-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-6 col-12 mb-12 mb-lg-0">
                                                            <div class="custom-block bg-white shadow-lg">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h5 class="mb-2">Katalog Dalam Terbitan & BIP Online</h5>
                                                                            <p class="mb-0">
                                                                                KDT atau Katalog Dalam Terbitan adalah salah satu layanan untuk penerbit, ingin mengetahui selengkapnya?
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="penerbit-tab-pane" role="tabpanel" aria-labelledby="penerbit-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-0">
                                                            <div class="custom-block bg-white shadow-lg">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h5 class="mb-2">Informasi Seputar ISBN</h5>
                                                                        <p class="mb-0">
                                                                            Ingin tahu lebih banyak tentang apa, bagaimana dan fungsi ISBN serta persyaratan untuk mendapatkannya?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="periode-isbn-tab-pane" role="tabpanel" aria-labelledby="periode-isbn-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-12 mb-6 mb-lg-0">
                                                            <div class="custom-block bg-white shadow-lg">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h5 class="mb-2">Informasi Seputar ISBN</h5>
                                                                        <p class="mb-0">
                                                                            Ingin tahu lebih banyak tentang apa, bagaimana dan fungsi ISBN serta persyaratan untuk mendapatkannya?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-12 mb-6 mb-lg-0">
                                                            <div class="custom-block bg-white shadow-lg">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h5 class="mb-2">Katalog Dalam Terbitan & BIP Online</h5>
                                                                            <p class="mb-0">
                                                                                KDT atau Katalog Dalam Terbitan adalah salah satu layanan untuk penerbit, ingin mengetahui selengkapnya?
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="wilayah-isbn-tab-pane" role="tabpanel" aria-labelledby="wilayah-isbn-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-12 mb-6 mb-lg-0">
                                                            <div class="custom-block bg-white shadow-lg">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h5 class="mb-2">Informasi Seputar ISBN</h5>
                                                                        <p class="mb-0">
                                                                            Ingin tahu lebih banyak tentang apa, bagaimana dan fungsi ISBN serta persyaratan untuk mendapatkannya?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-12 mb-6 mb-lg-0">
                                                            <div class="custom-block bg-white shadow-lg">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <h5 class="mb-2">Katalog Dalam Terbitan & BIP Online</h5>
                                                                            <p class="mb-0">
                                                                                KDT atau Katalog Dalam Terbitan adalah salah satu layanan untuk penerbit, ingin mengetahui selengkapnya?
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                                <a href="#section_2" class="btn custom-btn mt-2 mt-lg-3" style="background-color: #13547a;" onclick="statistik_read_section()">Lebih sedikit</a>
                                            </center>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- end statistik panjang-->
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>

<!-- section alur daftar -->
<section class="timeline-section section-padding" id="section_3">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="text-white mb-4">Alur Pendaftaran ISBN Online?</h1>
            </div>

            <div class="col-lg-10 col-12 mx-auto">
                <div class="timeline-container">
                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline" style="margin-top: 10px;">
                        <div class="list-progress">
                            <div class="inner"></div>
                        </div>

                        <li>
                            <h4 class="text-white mb-3">Daftar Online ISBN</h4>

                            <p class="text-white">
                                Mulai dengan unggah berkas yang akan dimintakan nomornya
                            </p>

                            <div class="icon-holder">
                                <i class="bi-search"></i>
                            </div>
                        </li>
                        
                        <li>
                            <h4 class="text-white mb-3">Verifikasi Berkas</h4>

                            <p class="text-white">
                                Berkas akan diverifikasi dan diinput sesuai dengan permintaan penerbit.
                            </p>

                            <div class="icon-holder">
                                <i class="bi-bookmark"></i>
                            </div>
                        </li>

                        <li>
                            <h4 class="text-white mb-3">Nomor ISBN selesai</h4>

                            <p class="text-white">
                                Nomor ISBN yang diminta akan keluar dan bisa diunduh mandiri di akun penerbit.
                            </p>

                            <div class="icon-holder">
                                <i class="bi-book"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12 text-center mt-5">
                <p class="text-white">
                    <a href="#" class="btn custom-btn custom-border-btn ms-3">Pelajari Lebih Lanjut</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- end alur daftar -->

<!-- section pertanyaan -->
<section class="faq-section section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h2 class="mb-4">Pertanyaan yang sering di ajukan</h2>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-5 col-12">
                <img src="{{ asset('template/images/icon_5.png') }}" class="img-fluid" alt="FAQs">
            </div>

            <div class="col-lg-6 col-12 m-auto">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana prosedur pengajuan ISBN?
                            </button>
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Sejak 1 April 2018 pengajuan ISBN dilakukan secara online di web 
                                
                                Berkas apa saja yang harus disiapkan? 

                                Ikuti tahapan registrasi. Registrasi adalah Registrasi Penerbit.
                                Pada tahap ini penerbit menyiapkan Surat Pernyataan (unduh di halaman registrasi) yang sudah diisi dengan benar dan lengkap
                                serta menyiapkan legalitas (bentuk legalitas, seperti : akta notaris, SK Rektor atau MoU, dapat dilihat contohnya
                                pada beranda)
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Jika pendaftaran sudah sukses, langkah apa yang harus dilakukan oleh penerbit selanjutnya?
                            </button>
                        </h2>

                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Sesuai notifikasi pada layar, hubungi Tim ISBN di +6221 3812 136 untuk permohonan validasi kemudian lihat email yang diberikan oleh sistem secara otomatis tentang petunjuk/ langkah selanjutnya.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            
                                Apakah penerbit lama juga harus melakukan Registrasi Penerbit?
                    
                            </button>
                        </h2>

                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                
                                Ya. Semua penerbit (baik lama maupun baru) harus melakukan tahap ini untuk mendapatkan akun agar bisa log in pada tahap registrasi ISBN.
                                
                                Bagaimana dengan legalitas penerbit, jika penerbit lama tidak/belum memiliki payung hukum?
                                
                                Legalitas harus tetap dipenuhi untuk kelengkapan administrasi penerbit dan akan memberi kekuatan hukum untuk penerbit itu sendiri.
                            
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            
                                Bagaimana jika nama penerbit yang didaftarkan tidak sesuai dengan nama pada legalitas?

                            </button>
                        </h2>

                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Penerbit baru, nama yang didaftarkan harus sesuai dengan yang termaktub pada legalitas. Namun untuk penerbit lama yang sudah terdaftar dan sudah memiliki element publisher, boleh menggunakan nama lama meskipun tidak sesuai dengan legalitasnya (pemutihan) 
                                
                                Bagaimana cara mendaftarkan lini atau imprint dari penerbitan? 
                                
                                Lini penerbitan atau imprint harus didaftarkan terpisah dari penerbit induknya, maksudnya supaya lini atau imprint tersebut mempunyai akun sendiri. Caranya daftarkan dengan mengisi surat pernyataan atas nama lini/imprint tersebut dan lampirkan legalitas perusahaan induk yang diperkuat dengan pernyataan keberadaan lini/imprint tersebut yang termaktub di dalam pasal kegiatan usaha (lihat contoh pendaftaran lini penerbit pada beranda).
                            
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                <a href="/detail_fnq" class="btn custom-btn mt-2 mt-lg-3" style="background-color: #13547a;">Lihat semua pertanyaan</a>
                </center>
            </div>

        </div>
    </div>
</section>
<!-- end pertanyaan -->


<!-- Modal pengumuman-->
<div class="modal fade" id="imageModalPengumuman" tabindex="-1" aria-labelledby="imageModalLabelPengumuman" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <img id="modalImage" src="" alt="Image Preview" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<!-- js data table pencarian-->
<script>
    
    function handleClickSearch() {
        //keyword pencarian
        var keyword_pencarian = $("#keyword_pencarian").val();
        //get data pencarian
        window.location.assign("/search?keyword="+keyword_pencarian);
    }
</script>

@push('scripts')
    <!-- modal pengumuman -->
    <script>
        function EmptyString(value) {
            return value == null || value == undefined || value.trim() == '';
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            var url = window.location.href;
            // Extract the fragment identifier
            var fragment = window.location.hash;
            // You can also remove the '#' character if needed
            var section = fragment.substring(1);

            if (EmptyString(section)) {
                $.ajax({
                    url: '/flyer',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    serverSide: true,
                    success: function(data) {
                        var data1 = "http://127.0.0.1:8000/template/images/HasilSKMISBN2024Periode1.jpg" //kalau live dihapus
                        showPengumuman(data1)
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX error:', textStatus, errorThrown); // Log any errors
                    }
                });
            }
        })

        function showPengumuman(imageUrl) {
            // Set the image source
            var imageElement = document.getElementById('modalImage');
            imageElement.src = imageUrl;

            // Wait for the image to load before showing the modal
            imageElement.onload = function() {
                var myModal = new bootstrap.Modal(document.getElementById('imageModalPengumuman'));
                myModal.show();
            };
        }
    </script>
    <!-- js data table BIP-->
    <script>
        $.ajax({
            url: 'https://dummyjson.com/c/e7b8-359e-41d6-9789',
            success: function(data) {
                console.log('AJAX response:', data.data); // Log the response data to the console
                var tableElement =  $('#doc_bip').DataTable({
                    data: data.data,
                    columns: [
                        { data: 'judul' },
                        { data: 'deskripsi' },
                        {
                            data: null,
                            defaultContent: '<button type="submit" class="form-control"><a class="nav-link click-scroll" href="#">Download</a></button>', // Tombol aksi
                            orderable: false
                        }
                    ],
                    lengthMenu: false 
                });

                //total row pada header card
                var totalRows = tableElement.data().count();
                document.getElementById('totalRowsBip').innerHTML = totalRows;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown); // Log any errors
            }
        });
    </script>
    <!-- end -->

    <!-- js data table surat-->
    <script>
        $.ajax({
            url: 'https://dummyjson.com/c/7162-7e63-4256-98bb',
            success: function(data) {
                console.log('AJAX response:', data.data); // Log the response data to the console
                var tableElement =  $('#doc_surat').DataTable({
                    data: data.data,
                    columns: [
                        { data: 'judul' },
                        { data: 'deskripsi' },
                        {
                            data: null,
                            defaultContent: '<button type="submit" class="form-control"><a class="nav-link click-scroll" href="#">Download</a></button>', // Tombol aksi
                            orderable: false
                        }
                    ],
                    lengthMenu: false 
                });

                //total row pada header card
                var totalRows = tableElement.data().count();
                document.getElementById('totalRowsSurat').innerHTML = totalRows;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown); // Log any errors
            }
        });
    </script>
    <!-- end -->

@endpush

