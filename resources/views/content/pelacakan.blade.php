@extends('index')

@push('styles')
     <style>
        .dt-length {
            display: none;
        }
        /* Gaya untuk elemen pencarian DataTables */
        .dt-input {
            width: 100%; /* Ubah lebar input */
            padding: 10px; /* Ubah padding */
            border-radius: 150px; /* Ubah radius border */
            border: 1px solid #ccc; /* Ubah border */
            font-size: 14px; /* Ubah ukuran font */
        }

        label[for^="dt-search-"] {
            display: none; /* Menyembunyikan elemen label */
        }
    </style>
@endpush

@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Lacak Permohonan ISBN</h1>

                <h6 class="text-white text-center">International Standard Book Number</h6>

                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">
                            
                        </span>
                        <input name="keyword" type="search" class="form-control" id="keyword_pencarian" placeholder="Tracking pengajuan ISBN berdasarkan No Resi Pengajuan ..." aria-label="Search">
                        <button type="submit" class="form-control">
                            <a class="nav-link click-scroll" href="#section_pencarian" onclick="handleClickPencarian()">Cari</a>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<section class="featured-section" style="display: none;">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12 mb-12 mb-lg-0">
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
                        <img src="images/icon_1.png" class="custom-block-image img-fluid" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="explore-section section-padding" id="section_pencarian" style="display: none;">
    <div class="container" >

        <div class="col-12 text-center">
            <h2 class="mb-4">Hasil Pencarian</h1>
            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                <div class="custom-block bg-white shadow-lg">
                    <div class="d-flex">
                        
                    </div>

                    <table id="table_filter" class="display responsive" style="width:100%;">
                        <thead>
                            <tr>
                                <th><center>No Resi </center></th>
                                <th><center>Judul </center></th>
                                <th><center>Kepengarang</center></th>
                                <th><center>Penerbit </center></th>
                                <th><center>NO. Antrian </center></th>
                                <th><center>Tahun Terbit</center></th>
                                <th><center>Tanggal Pengajuan</center></th>
                            </tr>
                        </thead>
                    </table>
                        <!-- <img src="images/topics/undraw_Compose_music_re_wpiw.png" class="custom-block-image img-fluid" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <!-- js data table pencarian-->
    <script>
        function isNotEmptyString(value) {
            return value !== null && value !== undefined && value.trim() !== '';
        }

        function handleClickPencarian() {
            // tampilan pencarian
            var element = document.getElementById('section_pencarian');
            element.style.display = '';
            //keyword pencarian
            var keyword_pencarian = $("#keyword_pencarian").val();
            //get data pencarian
            $.ajax({
                url: 'https://dummyjson.com/c/7417-1869-4e0a-83d5',
                dataType: 'json',
                serverSide: true,
                success: function(data) {
                    var tableElement = $('#table_filter');
                    // hapus DataTable jika sudah ada
                    if ($.fn.DataTable.isDataTable(tableElement)) {
                        tableElement.DataTable().destroy();
                    }

                    // Inisialisasi DataTable
                    console.log('AJAX response:', data.data); // Log the response data to the console
                    var tableElement = $('#table_filter').DataTable({
                        data: data.data,
                        columns: [
                            { data: 'resi' },
                            { data: 'judul' },
                            { data: 'kepengarangan' },
                            { data: 'penerbit' },
                            { data: 'no_antrian' },
                            { data: 'thn_terbit' },
                            { data: 'tgl_pengajuan' },
                        ],
                        lengthMenu: false,
                    });

                    //filter datatable
                    if (isNotEmptyString(keyword_pencarian)) {
                        tableElement.search(keyword_pencarian).draw();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown); // Log any errors
                }
            });
        }
    </script>
    <!-- end -->
@endpush