<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/logo_aja.png" type="image/x-icon">

        <meta name="description" content="aplikasi tentang seputar isbn dan tracking pengajuan isbn, free, perpusnas" />
		<meta name="keywords" content="isbn, ISBN, perpusnas,buku, pemerintah, tracking isbn, lacak isbn, prosedur pengajuan isbn, isbn prosedur, bip isbn, pencarian isbn, buku isbn, terbitan isbn, statistik isbn, penerbit, buku penerbit, penerbit buku, " />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_ID" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="ISBN" />
		<meta property="og:url" content="{{ config('app.url') }}" />
		<meta property="og:site_name" content="ISBN PERPUSNAS" />

        <meta name="author" content="tim isbn, pemerintah">

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

        @stack('scripts')


        

        

        

    </body>


</html>
