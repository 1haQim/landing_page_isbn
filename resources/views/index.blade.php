<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/logo_aja.png" type="image/x-icon">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>ISBN</title>

        <!-- CSS FILES -->        
         
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('template/css/templatemo-topic-listing.css') }}" rel="stylesheet">  
        
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
                            let data = "http://127.0.0.1:8000/template/images/HasilSKMISBN2024Periode1.jpg" //kalau live dihapus
                            showPengumuman(data)
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

    </body>


</html>
