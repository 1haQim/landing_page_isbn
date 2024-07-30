@extends('index')
@section('content')

<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Detail FAQ</li>
                    </ol>
                </nav>
                <h2 class="text-white">Detail FAQs</h2>
            </div>
        </div>
    </div>
</header>

<section class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">pertanyaan yang sering dipertanyaakan</h3>
            </div>
            <div class="col-lg-12 col-12 mt-3 mx-auto" id="card_detail_faq">
                
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $.ajax({
            url: 'https://dummyjson.com/c/1722-ec23-4555-a072',
            success: function(data) {
                var card_faq = '';
                data.data.forEach((item, index) => {
                    card_faq += `
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex" >
                            <span class="badge bg-design rounded-pill ms-auto">${index + 1}</span>

                            <div class="custom-block-topics-listing-info d-flex">
                                <div >
                                    <div>
                                        <h5 class="mb-2">`+ item.judul +`</h5>
                                        <p class="mb-0">`+ item.deskripsi +`</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                    
                });
                document.getElementById('card_detail_faq').innerHTML = card_faq;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown); // Log any errors
            }
        });
    </script>
@endpush