
@extends('index')

{{-- @push('styles')
@endpush --}}

@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12 mx-auto">
                <h1 class="text-white text-center">Hasil Pencarian</h1>
            </div>
        </div>
    </div>
</section>

<section class="explore-section section-padding" id="section_pencarian">
    <div class="container" style="margin-top: -200px">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-12">
                <div class="card bg-white shadow-lg">
                    <div class="card-body">
                       
                        <ul class="list-group">
                            <center><p>Penerbit</p></center>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                                <span class="badge badge-primary badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dapibus ac facilisis in
                                <span class="badge badge-primary badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Morbi leo risus
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                        </ul>
                        <hr>
                        <ul class="list-group">
                            <center><p>Lokasi Terbitan</p></center>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                JAKARTA
                                <span class="badge badge-primary badge-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                BANDUNG
                                <span class="badge badge-primary badge-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                SURABAYA
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="card bg-white shadow-lg">
                    <div class="card-body">
                        <div class="data-tables">
                            <table id="dataTable" class="display responsive dataTable no-footer dtr-inline">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width:1000px">Judul</th>
                                        {{-- <th>Seri</th> --}}
                                        <th>Kepengarangan</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>ISBN</th>
                                        {{-- <th>Link</th>
                                        <th>Website</th>
                                        <th>Email</th> --}}
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


<!-- js data table pencarian-->
@push('scripts')
<script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const keyword_pencarian = urlParams.get('keyword');
        window.history.replaceState({}, document.title, window.location.pathname);

        if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().destroy();
        }

        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pencarian.search') }}", 
                type: 'GET', 
                data: function(d) {
                    // Calculate the current page and send it to the server
                    d.page = (d.start / d.length) + 1; // Current page (1-based)
                    d.pageSize = d.length; // Number of records per page
                    d.search = d.search.value; // Pencarian global
                }
            },
            pageLength: 10, // Default number of records per page
            lengthMenu: [5, 10, 25, 50],
            columns: [
                { data: 'TITLE' },
                { data: 'CREATEBY' },
                { data: 'PUBLISHER' },
                { data: 'PUBLISH_YEAR' },
                { data: 'ISBN' }
            ],
            search: {
                search: keyword_pencarian 
            },
            drawCallback: function(settings) {
                // document.getElementById('totalRowsSurat').innerHTML = settings._iRecordsTotal;
            }
        });
    })
</script>

@endpush
  