@extends('index')
@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-12 mx-auto">
                <h1 class="text-white text-center">Pertanyaan yang sering diajukan</h1>
                <h6 class="text-white text-center">International Standard Book Number</h6>

                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">
                            
                        </span>
                        <input name="keyword" type="search" class="form-control" id="keyword_pencarian" placeholder="Cari Pertanyaan ..." aria-label="Search">
                        <button type="submit" class="form-control">
                            <a class="nav-link click-scroll" href="#section_pencarian" onclick="handleClickPencarian()">Cari</a>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<section class="explore-section section-padding" >
    <div class="container" style="margin-top: -220px">
        <div class="row">
            <div class="col-lg-11 col-11 mt-3 mx-auto" id="card_detail_faq">
                
            </div>
        </div>
    </div>
</section>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            getData('');
        })
        
        function handleClickPencarian() {
            //keyword pencarian
            var keyword_pencarian = $("#keyword_pencarian").val();
            var keyword = "";
            if (!EmptyString(keyword_pencarian)) {
                keyword = keyword_pencarian
            }
            getData(keyword) 
        }

        function getData(keyword) {
            $.ajax({
                url: 'https://dummyjson.com/c/1722-ec23-4555-a072',
                success: function(data) {
                    var card_faq = '';
                    var filteredItems = data.data.filter(function(item) {
                        // Example condition: filter items where 'judul' contains the word 'FAQ'
                        return item.judul.includes(keyword);
                    });

                    filteredItems.forEach((item, index) => {
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
        }
    </script>
@endpush