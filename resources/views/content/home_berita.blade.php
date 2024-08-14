<div class="row" id="data_berita"></div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('berita') }}", 
                type: 'GET',  
                dataType: 'json',  
                processing: true,  
                serverSide: true,    
                success: function(data) {
                    // Handle the response
                    var htmlContent = ``;
                    data.Items.forEach(function(value) {
                        htmlContent += `<div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-3">`+ value.JUDUL + `</h5>
                                        <p class="mb-0">`
                                            + value.BERITA +
                                        `</p>
                                    </div>
                                    <span class="badge rounded-pill" style="background-color: #13547a;width: 200px; float:right">23.4.2024</span>
                                </div>
                                <img src="{{ asset('template/images/topics/undraw_Finance_re_gnv2.png') }}" class="custom-block-image img-fluid" alt="">
                            </div>
                        </div>`
                    });
                    document.getElementById('data_berita').innerHTML = htmlContent
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown);
                }
            });
        })
    </script>
@endpush