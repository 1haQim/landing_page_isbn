<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/logo_aja.png" type="image/x-icon">

        <meta name="description" content="">
        <meta name="author" content="">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

        <title>ISBN</title>

        <!-- CSS FILES -->        
         
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet">

        <link href="{{ asset('template/css/templatemo-topic-listing.css') }}" rel="stylesheet">  
        
        <!-- data table -->
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
        <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet">  
        <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css" rel="stylesheet">  
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

        </style> --}}
        <!-- end datatable -->
        <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/DataTable/css/jquery.dataTables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/DataTable/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/DataTable/css/responsive.bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/DataTable/css/responsive.jqueryui.min.css') }}">
        
        <style>
            .card {
                border-radius: var(--border-radius-medium);
                padding: 30px;
                transition: all 0.3s ease;
                border : none
            }

        </style>

        @stack('styles')

    </head>
    
    <body id="top">

        <main>

            @include('template/nav')

            @yield('content')

           
        </main>

        @include('template/footer')

         <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('template/js/jquery.min.js') }}"></script>
        <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('template/js/click-scroll.js') }}"></script>
        <script src="{{ asset('template/js/custom.js') }}"></script>

        @stack('scripts')

        {{-- datatable --}}
         <!-- bootstrap 4 js -->
        <script src="{{ asset('template/plugins/DataTable/js/bootstrap.min.js ') }}"></script>
        <script src="{{ asset('template/plugins/DataTable/js/metisMenu.min.js ') }}"></script>
        <script src="{{ asset('template/plugins/DataTable/js/jquery.slimscroll.min.js ') }}"></script>

        <!-- Start datatable js -->
        <script src="{{ asset('template/plugins/DataTable/js/jquery.dataTables.js ') }}"></script>
        <script src="{{ asset('template/plugins/DataTable/js/jquery.dataTables.min.js ') }}"></script>
        <script src="{{ asset('template/plugins/DataTable/js/dataTables.bootstrap4.min.js ') }}"></script>
        <script src="{{ asset('template/plugins/DataTable/js/dataTables.responsive.min.js ') }}"></script>
        <script src="{{ asset('template/plugins/DataTable/js/responsive.bootstrap.min.js ') }}"></script>
        <!-- others plugins -->
        <script src="{{ asset('template/plugins/DataTable/js/scripts.js') }}"></script>
        {{-- end datatable --}}

        <!-- modal panduan layanan -->
        <script>
            function openModal(element) {
                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
                myModal.show();
            }
        </script>

        <script>
             $(document).ready(function() {
                // Set the image source to the modal image jika besok menggunakan ajax
                // document.getElementById('modalImage').src = imgSrc;
                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('imageModalPengumuman'));
                myModal.show();
             })
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

        <script>
            //menampilkan data lengkap statistik
            function statistik_read_all() {
                document.getElementById('statistik_lengkap').style.display = '';
                document.getElementById('statistik_singkat').style.display = 'none';
            }

            //hide data lengkap statistik
            function statistik_read_section() {
                document.getElementById('statistik_lengkap').style.display = 'none';
                document.getElementById('statistik_singkat').style.display = '';
            }
        </script>

    </body>


</html>
