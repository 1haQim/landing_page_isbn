
@extends('index')
@section('content')


@push('style')

<style>
    .nav-pills .nav-link.active{
        background-color: red
    }
    .sticky-wrapper {
        position: -webkit-sticky;
        position: sticky;
        top: 0; /* or any offset */
        z-index: 1000; /* Make sure it stays on top */
    }
    
    .scrollable-container {
        max-height: 300px; /* Adjust based on your needs */
        overflow-y: auto;
    }
    
    .topics-detail-block-image {
        max-width: 100%; /* Responsive image */
    }
</style>

@endpush

<style>
    #navbar-example3 .nav .nav-pills .flex-column .nav-link .active{
        background-color: red
    }
</style>

<section class="hero-section d-flex justify-content-center align-items-center" id="section_0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12 mx-auto">
                <h1 class="text-white text-center">Informasi umum ISBN</h1>
                <h6 class="text-white text-center">International Standard Book Number</h6>
            </div>
        </div>
    </div>
</section>

<section class="explore-section section-padding">
    <div class="container" style="margin-top: -200px">
        <div class="row justify-content-center">
  
            <div class="col-lg-4 col-6">
                <div class="card bg-white shadow-lg" style=" position: -webkit-sticky; position: sticky; top: 20px; z-index: 1000;">
                    <div class="card-body">
                        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                            <nav class="nav nav-pills flex-column">
                                @foreach($menu as $k => $v)
                                <a class="nav-link" href="#item-{{ $k }}">{{ $v }}</a>
                                @endforeach
                            </nav>
                        </nav>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-6">
                <div class="card bg-white shadow-lg">
                    <div class="card-body">
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                            <!-- nomer 1 -->
                            <div class="content-section" id="item-0">
                                <center><h5 class="mb-3">Pengertian ISBN?</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <ol>
                                        <p>ISBN (International Standard Book Number) adalah kode pengidentifikasian buku yang bersifat unik. Informasi tentang judul, penerbit, dan kelompok penerbit tercakup dalam ISBN. ISBN terdiri dari deretan angka 13 digit, sebagai pemberi identifikasi terhadap satu judul buku yang diterbitkan oleh penerbit. Oleh karena itu satu nomor ISBN untuk satu buku akan berbeda dengan nomor ISBN untuk buku yang lain.</p>
                                        <p>ISBN diberikan oleh Badan Internasional ISBN yan berkedudukan di London. Di Indonesia, Perpustakaan Nasional RI merupakan Badan Nasional ISBN yang berhak memberikan ISBN kepada penerbit yang berada di wilayah Indonesia. Perpustakaan Naasional RI mempunyai fungsi memberikan informasi, bimbingan dan penerapan pencantuman ISBN serta KDT (Katalog Dalam Terbitan). KDT merupakan deskripsi bibliografis yang dihasilkan dari pengolahan data yang diberikan penerbit untuk dicantumkan di halaman balik judul sebagai kelengkapan penerbit.</p>
                                    <ol>
                                    </div>
                            </div>
                            <!-- nomer 2 -->
                            <div class="content-section" id="item-1">
                                <center><h5 class="mb-3">Fungsi ISBN?</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>
                                        <ol>
                                            <li>Memberikan identitas terhadap satu judul buku yang diterbitkan oleh penerbit</li>
                                            <li>Membantu memperlancar arus distribusi buku karena dapat mencegah terjadinya kekeliruan dalam pemesanan buku</li>
                                            <li>Sarana promosi bagi penerbit karena informasi pencantuman ISBN disebarkan oleh Badan Nasional ISBN Indonesia di Jakarta, maupun Badan Internasional yang berkedudukan di London</li>
                                        </ol>
                                    </p>
                                </div>
                            </div>
                            <!-- nomer 3 -->
                            <div class="content-section" id="item-2">
                                <center><h5 class="mb-3">Struktur ISBN?</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>Nomor ISBN terdiri dari 13 digit dan dibubuhi huruf ISBN didepannya. Nomor tersebut terdiri atas 5 (lima) bagian. Masing-masing bagian dicetak dengan 
                                        dipisahkan dengan tanda hyphen (-). Kelompok pembagian nomor ISBN ditentukan dengan struktur sebagai berikut:<br/>
                                        Contoh : <b class="style5">ISBN 978-602-8519-93-9</b></p>
                                    <p>
                                        <ul>
                                            <li>Angka pengenal produk terbitan buku dari EAN (Prefix identifier) = <b>978</b></li>
                                            <li>Kode kelompok (group identifier) = <b>602</b> (Default)</li>
                                            <li>Kode penerbit (publisher prefix) = <b>8519</b></li>
                                            <li>Kode Judul (title identifier) = <b>93</b></li>
                                            <li>Angka pemeriksa (check digit) = <b>9</b></li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            <!-- nomer 4 -->
                            <div class="content-section" id="item-3">
                                <center><h5 class="mb-3">Terbitan yang dapat diberikan ISBN</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>
                                        <ol>
                                            <li>Buku tercetak (monografi) dan pamphlet</li>
                                            <li>Terbitan Braille</li>
                                            <li>Buku peta</li>
                                            <li>Film, video, dan transparansi yang bersifat edukatif</li>
                                            <li>Audiobooks pada kaset, CD, atau DVD</li>
                                            <li>Terbitan elektronik (misalnya machine-readable tapes, disket, CD-ROM dan publikasi di Internet)</li>
                                            <li>Salinan digital dari cetakan monograf</li>
                                            <li>Terbitan microform</li>
                                            <li>Software edukatif</li>
                                            <li>Mixed-media publications yang mengandung teks</li>
                                        </ol>
                                    </p>
                                </div>
                            </div>
                            <!-- nomer 5 -->
                            <div class="content-section" id="item-4">
                                <center><h5 class="mb-3">Terbitan yang tidak dapat diberikan ISBN</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>
                                        <ol>
                                            <li>Terbitan yang terbit secara tetap (majalah, bulletin, dsb.)</li>
                                            <li>Iklan</li>
                                            <li>Printed music</li>
                                            <li>Dokumen pribadi (seperti biodata atau profil personal elektronik)</li>
                                            <li>Kartu ucapan</li>
                                            <li>Rekaman musik</li>
                                            <li>Software selain untuk edukasi termasuk game</li>
                                            <li>Buletin elektronik</li>
                                            <li>Surat elektronik</li>
                                            <li>Permainan</li>
                                        </ol>
                                    </p>
                                </div>
                            </div>
                            <!-- nomer 6 -->
                            <div class="content-section" id="item-5">
                                <center><h5 class="mb-3">Pencantuman ISBN</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>ISBN ditulis dengan huruf cetak yang jelas dan mudah dibaca. Singkatan ISBN ditulis dengan huruf besar mendahului penulisan angka pengenal kelompok, pengenal penerbit, pengenal judul dan angka pemeriksa. Penulisan antara setiap bagian pengenal dibatasi oleh tanda penghubung, seperti contoh berikut:</p>
                                    <p>
                                        <b>ISBN 978-602-8519-93-9</b>
                                    </p>
                                    <p>Untuk terbitan cetak, ISBN dicantumkan pada:</p>
                                    <p>
                                        <ol type="a">
                                            <li>Bagian bawah pada sampul belakang (back cover)</li>
                                            <li>Verso (dibalik halaman judul) (halaman copyright)</li>
                                            <li>Punggung buku (spine) untuk buku tebal , bila keadaan memungkinkan</li>
                                        </ol>
                                    </p>
                                </div>
                            </div>
                            <!-- nomer 7 -->
                            <div class="content-section" id="item-6">
                                <center><h5 class="mb-3">Persyaratan permohonan ISBN, KDT dan barcode anggota baru</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>Permohonan dapat dilakukan secara online atau manual dengan melengkapi persyaratan<br /></p>
                                    <ol>
                                        <li>Mengisi formulir surat pernyataan disertai dengan stempel penerbit dengan menunjukkan bukti legalitas penerbit atau lembaga yang bertanggung jawab (akta notaris)</li>
                                        <li>Membuat surat permohonan atas nama penerbit (berstempel) untuk buku yang akan diterbitkan</li>
                                        <li>Mengirimkan atau melampirkan fotokopi :
                                            <ol>
                                                <li>Halaman Judul</li>
                                                <li>Balik Hal Judul</li>
                                                <li>Kata Pengantar</li>
                                                <li>Daftar Isi</li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <!-- nomer 8 -->
                            <div class="content-section" id="item-7">
                                <center><h5 class="mb-3">Persyaratan permohonan ISBN, KDT dan barcode anggota lama</h5></center>
                                <div class="row my-4">
                                <hr>
                                    <p>Hanya nomor 2 dan 3 saja yang perlu dikirimkan ke Tim ISBN & KDT</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
     document.addEventListener('DOMContentLoaded', () => {
        const navLinks = document.querySelectorAll('#navbar-example3 .nav-link');
        const sections = document.querySelectorAll('.content-section');

        // Function to remove active class from all nav links
        function removeActiveClass() {
            navLinks.forEach(link => link.classList.remove('active'));
        }

        // Function to add active class to the clicked nav link
        function setActiveLink(index) {
            removeActiveClass();
            navLinks[index].classList.add('active');
        }

        //buat scroll up
        const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = Array.from(sections).indexOf(entry.target);
                    setActiveLink(index);
                }
            });
        }, {
            threshold: 0.5 // Adjust this value to trigger earlier or later
        });
        // Observe each section
        sections.forEach(section => observer.observe(section));

        // Add click event listeners to each nav link (ketika di klik)
        navLinks.forEach((link, index) => {
            console.log(index, 'index foreach')
            link.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default anchor behavior

                // Smooth scroll to the target section
                const targetId = link.getAttribute('href').substring(1); // Remove the '#'
                const targetSection = document.getElementById(targetId);

                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }

                // Update the active link
                setActiveLink(index);
            });
        });
    });
</script>