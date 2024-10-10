
@extends('index')
<style>
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: #fff; /* Example color for active link text */
        background-color: red; /* Example color for active background */
    }
    .dataTables_filter {
        display: none;
    }
    .nav-link.active,.nav-pills .show>.nav-link {
        color: red;
        background-color: rgb(1, 34, 105);
    }
</style>


@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-3 col-12 mx-auto"></div>
            <div class="col-lg-8 col-12 mx-auto"> -->
                <h1 class="text-white text-center mb-10">Hasil Pencarian</h1>
                
            <!-- </div> -->
        </div>
    </div>
</section>

<section class="explore-section section-padding" id="section_pencarian">
    <div class="container" style="margin-top: -200px">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-12" style="margin-bottom:20px">
                <div class="card bg-white shadow-lg" style=" position: -webkit-sticky; position: sticky; top: 100px; z-index: 1;">
                    <div class="card-body">
                        <center><p>Top 5 Penerbit</p></center>
                        <nav id="navbar-penerbit" class="h-100 flex-column align-items-stretch pe-4 border-end">
                            <nav class="nav nav-pills flex-column">
                                @foreach($penerbitPopuler as $k => $v)
                                    <a class="nav-link" href="">{{ $v['NAMA_PENERBIT'] }}</a>
                                @endforeach
                            </nav>
                        </nav>
                    </div>
                    <div class="card-body">
                        <center><p>Top 5 Kota, Penerbit Terbanyak</p></center>
                        <nav id="navbar-kota" class="h-100 flex-column align-items-stretch pe-4 border-end">
                            <nav class="nav nav-pills flex-column">
                                @foreach($kotaPopuler as $k => $v)
                                    <a class="nav-link" href="">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $v['CITY'] }}
                                        <span class="badge badge-primary badge-pill" style="color:red">{{ number_format($v['JUMLAH']) }}</span>
                                    </li>
                                    </a>
                                @endforeach
                            </nav>
                        </nav>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-12">
                <div class="card bg-white shadow-lg">
                    <div class="card-body">
                        <div class="input-group input-group-lg" >
                            <select id="filter_search" style=" max-width: 250px;"  class="form-control select2 ">
                                <option value="all">Semua</option>
                                <option value="PT.TITLE" >Judul </option>
                                <option value="PT.KEPENG" >Kepengarangan </option>
                                <option value="P.NAME" >Penerbit </option>
                                <option value="PI.ISBN_NO" >ISBN </option>
                            </select>
                            <!-- <i class="bi bi-caret-down-fill"></i> -->
                            <input style="margin-left:20px" id="keyword_pencarian" name="" type="search" class="form-control"  placeholder="Masukan kata untuk mencari " aria-label="Search">
                            <button type="button" class="" id="searchButton" onclick="handleClickSearch()" style="background-color:rgb(1, 34, 105);border:none; border-radius:0px 10px 10px 0px">
                                <span class="input-group-text bi-search" id="basic-addon1" style="background-color: rgb(1, 34, 105); color:white; border:none"></span>
                            </button>
                        </div>
                        <div class="data-tables" style="margin-top:50px">
                            <table id="dataTable" class="display responsive dataTable no-footer dtr-inline">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width:1000px">Judul</th>
                                        <th>Kepengarangan</th>
                                        <th>Tahun</th>
                                        <th>ISBN</th>
                                        <th>Tempat Terbit</th>
                                        <th>Penerbit</th>
                                        <th>Jumlah Jilid</th>
                                        <th>Seri</th>
                                        <th>Link Buku</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<input type="hidden" id="kota_filter">
<input type="hidden" id="penerbit_filter">

<!-- // Event untuk memicu pencarian custom saat input berubah
$('#customSearchField').on('keyup', function() {
    $('#example').DataTable().ajax.reload();
}); -->

<!-- js data table pencarian-->
@push('scripts')
<script>
    $(document).ready(function() {
        //load datatable
        dataTables();
        //end loaddata
    })

    //link aktif untuk menu penerbit
    const navLinksPenerbit = document.querySelectorAll('#navbar-penerbit .nav-link');
    // Function to remove active class from all nav links
    function removeActiveClass() {
        navLinksPenerbit.forEach(link => link.classList.remove('active'));
    }

    // Function to add active class to the clicked nav link
    function setActiveLink(index) {
        const clickedLink = navLinksPenerbit[index];
        if (clickedLink.classList.contains('active')) { //klik di aktif yang sama
            clickedLink.classList.remove('active');
            document.getElementById('penerbit_filter').value = ""; //set value untuk filter by

            var filter2 = document.getElementById('filter_search').value
            var keyword2 = document.getElementById('keyword_pencarian').value
            
            dataTables(filter2, keyword2); //load data table
            
        } else {
            removeActiveClass();
                // filter data table
            const nm_penerbit = clickedLink.textContent;
            document.getElementById('penerbit_filter').value = nm_penerbit; //set value untuk filter by
            var filter2 = document.getElementById('filter_search').value
            var keyword2 = document.getElementById('keyword_pencarian').value
            
            dataTables(filter2, keyword2); //load data table

            
            clickedLink.classList.add('active');
        }
    }

    navLinksPenerbit.forEach((link, index) => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior
            // Update the active link
            setActiveLink(index);
        });
    });


    
    //link aktif untuk menu kota 
    const navLinksKota = document.querySelectorAll('#navbar-kota .nav-link');
    // Function to remove active class from all nav links
    function removeActiveClassKota() {
        navLinksKota.forEach(link => link.classList.remove('active'));
    }

    // Function to add active class to the clicked nav link
    function setActiveLinkKota(index) {
        const clickedLinkKota = navLinksKota[index];
        if (clickedLinkKota.classList.contains('active')) { //klik di aktif yang sama
            clickedLinkKota.classList.remove('active');
            document.getElementById('kota_filter').value = ""; //set value untuk filter by
            var filter1 = document.getElementById('filter_search').value
            var keyword1 = document.getElementById('keyword_pencarian').value
            
            dataTables(filter1, keyword1); //load data table
        } else {
            removeActiveClassKota(); //remove aktif
            clickedLinkKota.classList.add('active'); // add new aktif

            const listItem = document.querySelector('#navbar-kota .nav-link.active .list-group-item ');
            const nm_kota = listItem.childNodes[0].textContent.trim();
            document.getElementById('kota_filter').value = nm_kota; //set value untuk filter by

            var filter1 = document.getElementById('filter_search').value
            var keyword1 = document.getElementById('keyword_pencarian').value
            
            dataTables(filter1, keyword1); //load data table
        }
    }

    navLinksKota.forEach((link, index) => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior

            // Update the active link
            setActiveLinkKota(index);
        });
    });

    function dataTables(params = null, keyword = null) {
        const urlParams = new URLSearchParams(window.location.search);
        const keyword_pencarian = urlParams.get('keyword');
        const filter_by = urlParams.get('filter');

        var setFilter = document.getElementById('filter_search').value

        if (filter_by) {
            var filter_by1 = filter_by
            // var keyword1 = document.getElementById('keyword_pencarian').value
        } else {
            if (params) {
                var filter_by1 = params;
            } else {
                var filter_by1 = 'all';
            }
        }

        // console.log(filter_by1,'filter');

        if (keyword_pencarian) {
            document.getElementById('keyword_pencarian').value = keyword_pencarian;
        } else {
            document.getElementById('keyword_pencarian').value = keyword;
        }

        
        document.getElementById('filter_search').value = filter_by1;
       
        window.history.replaceState({}, document.title, window.location.pathname);

        if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().destroy();
        }

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pencarian.search') }}", 
                type: 'GET', 
                data: function(d) {
                    // Calculate the current page and send it to the server
                    d.page = (d.start / d.length) + 1; // Current page (1-based)
                    d.pageSize = d.length; // Number of records per page
                    d.search = document.getElementById('keyword_pencarian').value; // Pencarian global
                    d.filter_by = filter_by1;
                    d.by_penerbit = document.getElementById('penerbit_filter').value;
                    d.by_kota = document.getElementById('kota_filter').value;
                }
            },
            pageLength: 10, // Default number of records per page
            lengthMenu: [5, 10, 25, 50],
            columns: [
                { data: 'TITLE' },
                { data: 'KEPENG' },
                { data: 'TAHUN_TERBIT' },
                { data: 'ISBN_NO' },
                { data: 'TEMPAT_TERBIT' },
                { data: 'NAMA_PENERBIT' },
                { data: 'JML_JILID' },
                { data: 'SERI' },
                { data: 'LINK_BUKU' }
            ],
            search: {
                search: document.getElementById('keyword_pencarian') 
            },
            drawCallback: function(settings) {
                // document.getElementById('totalRowsSurat').innerHTML = settings._iRecordsTotal;
            }
        });

        $('#searchButton').on('click', function() {
            table.ajax.reload(); // Reload DataTable with the current value of customSearchField
        });

    }

    // Menambahkan event listener untuk menangani tombol Enter
    document.getElementById('keyword_pencarian').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Mencegah form disubmit secara default

            var filter_by = document.getElementById('filter_search').value;

            if (filter_by == null || filter_by == '') {
                filter_by = 'all';
            }
                
            dataTables(filter_by, document.getElementById('keyword_pencarian').value); //load data table
            // handleClickSearch(); // Memanggil fungsi handleClickSearch
        }
    });

    function handleClickSearch() {
        //keyword pencarian
        var filter_by = document.getElementById('filter_search').value;
        if (filter_by == null || filter_by == '') {
            filter_by = 'all';
        }
        var keyword_pencarian = document.getElementById('keyword_pencarian').value;

        dataTables(filter_by, keyword_pencarian); //load data table
       
    }
    
</script>

@endpush
  