@extends('index')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}"/>
    <style>
		.content .clearfix{
			background-color: #f0f8ff;
		}
		.form-control{
			background-color: white;
		}
		label[for] {
            color: black; 
        }
	</style>
@endpush

@section('content')
<section class="hero-section justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Pendaftaran Online</h1>

                <h6 class="text-white text-center">International Standard Book Number</h6>
            </div>

        </div>
    </div>
</section>
<section class="featured-section" style="background-color: #f0f8ff;">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                <div class="custom-block bg-white shadow-lg">
                    <div class="wizard-form">
                        <form class="form-register" id="form-register" action="#" method="post">
                            <div id="form-total">
                                <!-- SECTION 1 -->
                                <h2>
                                    <span class="step-icon"><i class="zmdi zmdi-account"></i></span>
                                    <span class="step-number">Step 1</span>
                                    <span class="step-text">Penerbit</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <h5>Penerbit tergolong lembaga ?</h5>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option1" value="option1">
                                                Lembaga Swasta
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option2" value="option2">
                                                Lembaga Pemerintah
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                <!-- SECTION 2 -->
                                <h2>
                                    <span class="step-icon"><i class="zmdi zmdi-card"></i></span>
                                    <span class="step-number">Step 2</span>
                                    <span class="step-text">Jenis Penerbit</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <h5>Jenis Penerbit ?</h5>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option1" value="option1">
                                                Kementerian dan dinas terkait
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option2" value="option2">
                                                Lembaga Pemerintah Non Kementerian dan unit terkait
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option1" value="option1">
                                                Perguruan Tinggi Negeri
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option2" value="option2">
                                                Pemerintah provinsi/Pemda dan dinas terkait
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option1" value="option1">
                                                BUMD/BUMN
                                            </label>
                                        </div>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="radio" name="options" id="option2" value="option2">
                                                UPT Penerbitan /Press/Publishing
                                            </label>
                                        </div>
                                        <br><br>
                                        <h5>File Penyataan</h5>
                                        <div class="form-row">
                                            <label class="list-group-item">
                                                <input type="file" name="options">
                                            </label>
                                        </div>
                                        <!-- <p>Unduh Formulir</p> -->
                                    </div>
                                </section>
                                <!-- SECTION 3 -->
                                <h2>
                                    <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <span class="step-number">Step 3</span>
                                    <span class="step-text">Identitas Penerbit</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <label for="username" style="color:black">Penerbit*</label>
                                                <input type="text" placeholder="" class="form-control" id="username" name="username"  >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <label for="username" style="color:black">Username*</label>
                                                <input type="text" placeholder="Username" class="form-control" id="username" name="username"  >
                                            </div>
                                        </div>
                                        
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <label for="password" style="color:black">Password*</label>
                                                <input type="password" placeholder="Password" class="form-control" id="password" name="password"   >
                                            </div>
                                            <div class="form-holder">
                                                <label for="confirm_password" style="color:black">Confirm Password*</label>
                                                <input type="password" placeholder="" class="form-control" id="confirm_password" name="confirm_password"  >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <label for="username" style="color:black">Nama Gedung (jika ada)</label>
                                                <input type="text" placeholder="" class="form-control" id="username" name="username"  >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <label for="username" style="color:black">Nama Jalan*</label>
                                                <input type="text" placeholder="" class="form-control" id="username" name="username"  >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <label for="password" style="color:black">provinsi*</label>
                                                <input type="text" placeholder="" class="form-control" id="" name=""   >
                                            </div>
                                            <div class="form-holder">
                                                <label for="confirm_password" style="color:black">Kabupaten / Kota</label>
                                                <input type="text" placeholder="" class="form-control" id="" name=""  >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <label for="" style="color:black">Kecamatan</label>
                                                <input type="text" placeholder="" class="form-control" id="" name=""  >
                                            </div>
                                            <div class="form-holder">
                                                <label for="" style="color:black">Kelurahan</label>
                                                <input type="text" placeholder="" class="form-control" id="" name="" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <label for="email" style="color:black">Email*</label>
                                                <input type="text" placeholder="Your Email" class="form-control" id="email" name="email" >
                                            </div>
                                            <div class="form-holder">
                                                <label for="email" style="color:black">Email Alternatif*</label>
                                                <input type="text" placeholder="Your Email" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <label for="username" style="color:black">Nama Admin</label>
                                                <input type="text" placeholder="" class="form-control" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <label for="password" style="color:black">Telephone</label>
                                                <input type="text" placeholder="" class="form-control" id="" name="" >
                                            </div>
                                            <div class="form-holder">
                                                <label for="confirm_password" style="color:black">Kode Pos</label>
                                                <input type="text" placeholder="" class="form-control" id="" name="">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </section>
                                <!-- SECTION 4 -->
                                <h2>
                                    <span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <span class="step-number">Step 4</span>
                                    <span class="step-text">Tambahan</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <label for="password" style="color:black">Admin Alternatif</label>
                                                <input type="password" placeholder="Password" class="form-control" id="password" name="password"   >
                                            </div>
                                            <div class="form-holder">
                                                <label for="confirm_password" style="color:black">Telephone Alternatif</label>
                                                <input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" name="confirm_password"  >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <label for="username" style="color:black">Website</label>
                                                <input type="text" placeholder="Username" class="form-control" id="username" name="username"  >
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="{{ asset('template/js/jquery.steps.js') }}"></script>
	<script src="{{ asset('template/js/main.js') }}"></script>
@endpush