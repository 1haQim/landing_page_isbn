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

@push('scripts')
<!-- js data table BIP-->
    <script>
        $(document).ready(function() {
            $('#doc_bip').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('bip.serverside_bip') }}", 
                    type: 'GET', 
                    data: function(d) {
                        // Calculate the current page and send it to the server
                        d.page = (d.start / d.length) + 1; // Current page (1-based)
                        d.pageSize = d.length; // Number of records per page
                    }
                },
                pageLength: 10, // Default number of records per page
                lengthMenu: [5, 10, 25, 50],
                columns: [
                    { data: 'TITLE', name: 'TITLE' },
                    { data: 'DESKRIPSI', name: 'DESKRIPSI' },
                    {
                        data: null,
                        defaultContent: '<button type="submit" class="form-control"><a class="nav-link click-scroll" href="#">Download</a></button>', // Tombol aksi
                        orderable: false
                    }
                ],
                drawCallback: function(settings) {
                    document.getElementById('totalRowsBip').innerHTML = settings._iRecordsTotal;
                }
            });
        });
    </script>
    <!-- end -->
@endpush