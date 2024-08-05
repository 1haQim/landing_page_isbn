
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

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
         const url = new URL(window.location.href);
        // Create a URLSearchParams object from the query string
        const params = new URLSearchParams(url.search);
        // Get the value of the 'keyword' parameter
        const keyword_pencarian = params.get('keyword');

        $.ajax({
            url: '/search',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            serverSide: true,
            data: {
                keyword: keyword_pencarian
            },
            success: function(data) {
                var tableElement = $('#dataTable');
                // hapus DataTable jika sudah ada
                if ($.fn.DataTable.isDataTable(tableElement)) {
                    tableElement.DataTable().destroy();
                }

                // Inisialisasi DataTable
                console.log('AJAX response:', data.Data.Items); // Log the response data to the console
                var tableElement = $('#dataTable').DataTable({
                    data: data.Data.Items,
                    columns: [
                        { data: 'TITLE' },
                        { data: 'CREATEBY' },
                        { data: 'PUBLISHER' },
                        { data: 'PUBLISH_YEAR' },
                        { data: 'ISBN' }
                        
                    ],
                    lengthMenu: false,
                });

                //filter datatable
                tableElement.search(keyword_pencarian).draw();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown); // Log any errors
            }
        });
    })
   




    // function isNotEmptyString(value) {
    //     return value !== null && value !== undefined && value.trim() !== '';
    // }

    // function handleClickPencarian() {
    //     // tampilan pencarian
    //     var element = document.getElementById('section_pencarian');
    //     element.style.display = '';
    //     //keyword pencarian
    //     var keyword_pencarian = $("#keyword_pencarian").val();
    //     //get data pencarian
    //     $.ajax({
    //         url: 'https://dummyjson.com/c/cd7a-89b4-4645-a6e6',
    //         dataType: 'json',
    //         serverSide: true,
    //         success: function(data) {
    //             var tableElement = $('#table_filter');
    //             // hapus DataTable jika sudah ada
    //             if ($.fn.DataTable.isDataTable(tableElement)) {
    //                 tableElement.DataTable().destroy();
    //             }

    //             // Inisialisasi DataTable
    //             console.log('AJAX response:', data.data); // Log the response data to the console
    //             var tableElement = $('#table_filter').DataTable({
    //                 data: data.data,
    //                 columns: [
    //                     { data: 'isbn' },
    //                     { data: 'judul' },
    //                     { data: 'pengarang' },
    //                     { data: 'terbit' }
    //                 ],
    //                 lengthMenu: false,
    //             });

    //             //filter datatable
    //             if (isNotEmptyString(keyword_pencarian)) {
    //                 tableElement.search(keyword_pencarian).draw();
    //             }
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.error('AJAX error:', textStatus, errorThrown); // Log any errors
    //         }
    //     });
    // }
</script>
<!-- end -->
  