@extends('index')

@push('styles')
    <link href="{{ asset('template/css/pendaftaran.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/pendaftaran_styling.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <style>
        #captcha .preview{
            color: #555;
            width: 100%;
            text-align: center;
            height: 40px;
            line-height: 40px;
            letter-spacing: 8px;
            border: 1px dashed #888;
            border-radius: 0.5em;
            margin-bottom: 1.6em;

        }
    </style>
@endpush

@section('content')
<section class="hero-section justify-content-center align-items-center">
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
    <div class="container_pendaftaran">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                <div class="custom-block bg-white shadow-lg">
                    <form id="contact" action="#">
                        <div>
                            <h3>Penerbit</h3>
                            <section>
                                
                                <label for="name">Penerbit  *</label> <br>
                                <label>
                                    <input type="radio" id="swasta" value="swasta" onclick="kat_penerbit(this)" name="radio"/>
                                    <span>Lembaga Swasta</span>
                                </label><br>
                                <label>
                                    <input type="radio" id="pemerintah" value="pemerintah" onclick="kat_penerbit(this)" name="radio"/>
                                    <span>Lembaga Pemerintah</span>
                                </label>
                            </section>
                            <h3>Jenis Penerbit</h3>
                            <section>
                                <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                                    <div class="row" style="margin-top: 15% ">
                                        <div class="col-lg-4 col-md-4 col-6 mb-6 mb-lg-6">
                                            <label for="name" style="float: ri">Jenis Penerbit  *</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-6 mb-6 mb-lg-6">
                                            <label>
                                                <input type="radio" name="radio"/>
                                                <span>Kementerian dan dinas terkait</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" name="radio"/>
                                                <span>Lembaga Pemerintah Non Kementerian dan unit terkait</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" name="radio"/>
                                                <span>Perguruan Tinggi Negeri</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" name="radio"/>
                                                <span>Pemerintah provinsi/Pemda dan dinas terkait</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" name="radio"/>
                                                <span>BUMD/BUMN</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" name="radio"/>
                                                <span>UPT Penerbitan /Press/Publishing</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 15% ">
                                    <div class="col-lg-4 col-md-4 col-6 mb-6 mb-lg-6">
                                        <label for="name" style="float: ri">File Pernyataan  *</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-6 mb-6 mb-lg-6">
                                        <div id="dropzone1" class="dropzone">
                                            <div class="dz-message" data-dz-message><span style="color: rgb(22 163 74)">Drop file pernyataan disini atau <span style="color: #00005c"><i><u>click</u></i></span> untuk upload.</span></div>
                                        </div>
                                        <span style="font-size: 11px; margin: 1%">Dibubuhi materai, ditanda tangani, distempel, dan dipindai (scan) ke dalam bentuk file pdf dengan ukuran tidak lebih dari 2MB. Setelah diunduh, diisi dan discan lakukan unggah surat pernyataan  </span>
                                        <button type="button" class="btn btn-outline-danger btn-sm" style="float: right; margin: 1%; border-radius: 10px; color:white">
                                            <a id="pernyataan_1" href="/docsurat/Surat Pernyataan Penerbit - 20220813.docx" class="u-label u-label--xs u-label--primary float-right">Unduh Formulir disini»</a>
                                        </button>
                                    </div>
                                </div>
                                <div id="form-akta">
                                    <div class="row" style="margin-top: 15% " >
                                        <div class="col-lg-4 col-md-4 col-6 mb-6 mb-lg-6">
                                            <label for="name" style="float: ri">File Akta  *</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-6 mb-6 mb-lg-6">
                                            <div id="dropzone2" class="dropzone">
                                                <div class="dz-message" data-dz-message><span style="color: rgb(22 163 74)">Drop file pernyataan disini atau <span style="color: #00005c"><i><u>click</u></i></span> untuk upload.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>(*) Mandatory</p>
                            </section>
                            <h3>Identitas</h3>
                            <section>
                                <div class="form-row row" style="margin-top:10%">
                                    <div class="col">
                                        <label for="username" style="color:black">Penerbit*</label>
                                        <input type="text" placeholder="" class="form-control" id="username" name="username"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="username" style="color:black">Username*</label>
                                        <input type="text" placeholder="Username" class="form-control" id="username" name="username"  >
                                    </div>
                                </div>    

                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="password" style="color:black">Password*</label>
                                        <input type="password" placeholder="Password" class="form-control" id="password" name="password"   >
                                    </div>
                                    <div class="col">
                                        <label for="confirm_password" style="color:black">Confirm Password*</label>
                                        <input type="password" placeholder="" class="form-control" id="confirm_password" name="confirm_password"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="username" style="color:black">Nama Gedung (jika ada)</label>
                                        <input type="text" placeholder="" class="form-control" id="username" name="username"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="username" style="color:black">Nama Jalan*</label>
                                        <input type="text" placeholder="" class="form-control" id="username" name="username"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="password" style="color:black">provinsi*</label>
                                        <input type="text" placeholder="" class="form-control" id="" name=""   >
                                    </div>
                                    <div class="col">
                                        <label for="confirm_password" style="color:black">Kabupaten / Kota</label>
                                        <input type="text" placeholder="" class="form-control" id="" name=""  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="" style="color:black">Kecamatan</label>
                                        <input type="text" placeholder="" class="form-control" id="" name=""  >
                                    </div>
                                    <div class="col">
                                        <label for="" style="color:black">Kelurahan</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="" >
                                    </div>
                                </div>

                               <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="email" style="color:black">Email*</label>
                                        <input type="text" placeholder="Your Email" class="form-control" id="email" name="email" >
                                    </div>
                                    <div class="col">
                                        <label for="email" style="color:black">Email Alternatif*</label>
                                        <input type="text" placeholder="Your Email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="username" style="color:black">Nama Admin</label>
                                        <input type="text" placeholder="" class="form-control" id="username" name="username">
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="password" style="color:black">Telephone</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="" >
                                    </div>
                                    <div class="col">
                                        <label for="confirm_password" style="color:black">Kode Pos</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="">
                                    </div>
                                </div>

                                <p>(*) Mandatory</p>
                            </section>
                            <h3>Tambahan</h3>
                            <section>
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
                                <div id="captcha" >
                                    <div class="preview"></div>
                                    <div class="captcha_form"> 
                                        <input type="text" id="captcha_form" class="form_input_captcha" placeholder=" ">
                                        <button class="captcha_refersh">
                                        </button>
                                    </div>
                                </div>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms" >I agree with the Terms and Conditions.</label>
                            <section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form container -->
@push('scripts')

<script>
    (function(){
        const fonts = ["cursive"];
        let captchaValue = "";
        function gencaptcha()
        {
            let value = btoa(Math.random()*1000000000);
            value = value.substr(0,5 + Math.random()*5);
            captchaValue = value;
        }

        function setcaptcha()
        {
            let html = captchaValue.split("").map((char)=>{
                const rotate = -20 + Math.trunc(Math.random()*30);
                const font = Math.trunc(Math.random()*fonts.length);
                return`<span
                style="
                transform:rotate(${rotate}deg);
                font-family:${font[font]};
                "
            >${char} </span>`;
            }).join("");
            document.querySelector("#captcha .preview").innerHTML = html;
        }

        function initCaptcha()
        {
            document.querySelector("#captcha .captcha_refersh").addEventListener("click",function(){
                gencaptcha();
                setcaptcha();
            });

            gencaptcha();
            setcaptcha();
        }
        initCaptcha();

        document.querySelector(".form_button").addEventListener("click",function(){
            let inputcaptchavalue = document.querySelector("#captcha input").value;

            if (inputcaptchavalue === captchaValue) 
            {
                // swal("","Log in","success");
                alert("Log in success");
            }
            else
            {
                // swal("Invalid Captcha");
                alert("Invalid Captcha");
            }
        });
    })();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

<script>
    var form = $("#contact");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }
    });
</script>


<script>
    // validasi kategori penerbit
    function kat_penerbit(radio) {
        if (radio.value == 'pemerintah') {
            document.getElementById('form-akta').style.display = 'none';
        } else {
            document.getElementById('form-akta').style.display = 'block';
        }
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script>
        var dropzone1 = new Dropzone("#dropzone1", {
            url: '/',
            paramName: "file",
            maxFilesize: 2, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false
        });
        var dropzone1 = new Dropzone("#dropzone2", {
            url: '/',
            paramName: "file",
            maxFilesize: 2, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false
        });
</script>
@endpush
