@extends('index')
@section('content')

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-12 mx-auto">
                <h1 class="text-white text-center">Verifikasi Pendaftaran</h1>
                <h6 class="text-white text-center">International Standard Book Number</h6>
            </div>
        </div>
    </div>
</section>

<section class="explore-section section-padding" >
    <div class="container" style="margin-top: -220px">
        <div class="row">
            <div class="col-lg-8 col-8 mt-3 mx-auto">
                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                    <div class="custom-block-topics-listing-info ">
                            <center><h5>Periksa email anda untuk melihat kode OTP</h5></center>
                            <form class="custom-form contact-form" role="form" style="margin-top: 50px" id="form-otp">
                                @csrf
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <input type="text" name="kode_otp" class="form-control" placeholder="Name" required="">
                                        <input type="hidden" value="{{ $username }}" name="username">
                                        <input type="hidden" value="{{ $email }}"  name="admin_email">
                                        <label for="floatingInput">Kode OTP</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 ms-auto">
                                    <div class="row">
                                        <div class="d-flex justify-content-center align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <button type="button" class="form-control" onclick="submitOtp('generate')">Kirim Ulang OTP</button>
                                        </div>
                                        <div class="col-lg-3 col-3">
                                            <button type="button" class="form-control" onclick="submitOtp('submit')">Submit</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                </div>`
            </div>
        </div>
    </div>
</section>

<script>
    function submitOtp(params) {
        if (params == 'generate') { //request kirim ulang otp
            $('#form-otp').append('<input type="hidden" id="" name="tipe" value="generate">');
        } else {
            $('#form-otp').append('<input type="hidden" id="" name="tipe" value="submit">');
        }

        $.ajax({
            url: '/verifikasi_pendaftaran',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: $('#form-otp').serialize(),
            success: function(data) {
                console.log(data, 'hakim data otp')
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown);
            }
        })
    }

</script>

