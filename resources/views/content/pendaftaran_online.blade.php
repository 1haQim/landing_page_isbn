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
        .select2-selection--single {
            height: 37px !important;
            line-height: 37px !important; /* Ensures the text is vertically centered */
        }

        .select2-selection__rendered {
            line-height: 37px !important; /* Ensures the text is vertically centered */
        }
        
        .inputcontainer {
            position: relative;
        }

        .icon-container {
            position: absolute;
            right: 10px;
            top: calc(50% - 10px);
        }
        .loader {
            position: relative;
            height: 20px;
            width: 20px;
            display: inline-block;
            animation: around 5.4s infinite;
        }

        @keyframes around {
            0% {
                transform: rotate(0deg)
            }
            100% {
                transform: rotate(360deg)
            }
        }

        .loader::after, .loader::before {
            content: "";
            background: white;
            position: absolute;
            display: inline-block;
            width: 100%;
            height: 100%;
            border-width: 2px;
            border-color: #333 #333 transparent transparent;
            border-style: solid;
            border-radius: 20px;
            box-sizing: border-box;
            top: 0;
            left: 0;
            animation: around 0.7s ease-in-out infinite;
        }

        .loader::after {
            animation: around 0.7s ease-in-out 0.1s infinite;
            background: transparent;
        }
        /* icon checklis berhasil  */
        .checkmark {
            width: 23px;
            height: 23px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill 0.4s ease-in-out 0.4s forwards, scale 0.3s ease-in-out 0.9s both;
        }
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
                /* box-shadow: inset 0px 0px 0px 30px  transparent; */
            }
        }
        /* end icon centang */

        .checkmark1 {
            width: 23px;
            height: 23px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px red;
            animation: fill1 0.4s ease-in-out 0.4s forwards, scale1 0.3s ease-in-out 0.9s both;
        }
        .checkmark__circle1 {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #fff;
            fill: none;
            animation: stroke1 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        @keyframes stroke1 {
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes scale1 {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        @keyframes fill1 {
            100% {
                box-shadow: inset 0px 0px 0px 30px red;
            }
        }

        /* loader page */
        

        /* loader css starts from here */
        .loader_page {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader_page .loader_page-inner {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: #f17f7f;
            display: flex;
            justify-content: center;
            align-items: center;
            -webkit-transition: width .5s, height 1s; /* For Safari 3.1 to 6.0 */
            transition: width .5s, height 1s;
        }

        .loader_page .loader_page-inner .loading-box .loader-message {
            padding: 1em 0;
            color: white;
        }

        .loader_page .loader_page-inner .loading-box .circular-loader {
            border: 3px solid #f3f3f3; /* Light grey */
            border-top: 3px solid #444; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            margin: 0 auto;
            transition: all .5s ease-out;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader_page .loader_page-inner .loading-box .circular-loader:before,
        .loader_page .loader_page-inner .loading-box .circular-loader:after {
            content: '';
            height: 0px;
            width: 0px;
            background-color: white;
            position: absolute;
            -webkit-transition: height .5s; /* For Safari 3.1 to 6.0 */
            transition: height .5s;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <div class="loader_page " id="loader_page" style="display: none">
                        <div class="card">
                        <div class="loader_page-inner loading">
                            <div class="loading-box">
                                <div class="circular-loader">
                                </div>
                                <div class="loader-message">Loading your data...</div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <form id="contact" action="#">
                        <div>
                            <h3>Penerbit</h3>
                            <section>
                                <label for="name">Penerbit  *</label> <br>
                                <label>
                                    <input type="radio" id="swasta" value="swasta" onclick="kat_penerbit(this)" name="kategori_penerbit" required/>
                                    <span>Lembaga Swasta</span>
                                </label><br>
                                <label>
                                    <input type="radio" id="pemerintah" value="pemerintah" onclick="kat_penerbit(this)" name="kategori_penerbit" required/>
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
                                                <input type="radio" value="1" name="jenis"/>
                                                <span>Kementerian dan dinas terkait</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" value="2" name="jenis"/>
                                                <span>Lembaga Pemerintah Non Kementerian dan unit terkait</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" value="3" name="jenis"/>
                                                <span>Perguruan Tinggi Negeri</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" value="4" name="jenis"/>
                                                <span>Pemerintah provinsi/Pemda dan dinas terkait</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" value="5" name="jenis"/>
                                                <span>BUMD/BUMN</span>
                                            </label><br>
                                            <label>
                                                <input type="radio" value="6" name="jenis"/>
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
                                <div class="form-row row" style="margin-top:90px">
                                    <div class="col">
                                        <label for="penerbit" style="color:black">Penerbit*</label>
                                        <input type="text" placeholder="" class="form-control" id="penerbit" name="nama_penerbit"  required>
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="username" style="color:black">Username*</label>
                                        <div class="inputcontainer">
                                            <input type="text" placeholder="Username" class="form-control" onchange="checkDataExisting('username',this.value)" id="username" name="user_name"  required>
                                            <div class="icon-container">
                                                <i class="loader" id="loader_username" style="display: none"></i>
                                                <svg class="checkmark" id="success_username" style="display: none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                </svg>
                                                <svg class="checkmark1" id="error_username" style="display: none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle1" cx="26" cy="26" r="25" fill="none" />
                                                    <path class="checkmark__circle1" fill="none" d="M16 16 36 36 M36 16 16 36" />
                                                </svg>
                                            </div>
                                        </div>
                                        <span id="ket_username" style="font-size:11px; color:red"></span>
                                    </div>
                                </div>    

                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="password" style="color:black">Password*</label>
                                        <input type="password" placeholder="Password" class="form-control" id="password" name="password"  onchange="validasi_password(this.value)" required>
                                    </div>
                                    <div class="col">
                                        <label for="confirm_password" style="color:black">Confirm Password*</label>
                                        <input type="password" placeholder="" class="form-control" id="confirm_password" name="password2" required>
                                    </div>
                                    <span id="ket_password" style="font-size:11px; color:red"></span>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="nm_gedung" style="color:black">Nama Gedung (jika ada)</label>
                                        <input type="text" placeholder="" class="form-control" id="nm_gedung" name="nama_gedung"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="nm_jalan" style="color:black">Nama Jalan*</label>
                                        <input type="text" placeholder="" class="form-control" id="nm_jalan" name="alamat_penerbit" required >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="provinsi" style="color:black">provinsi*</label>
                                        <select id="provinsi" style="width: 100%;" class="form-control select2" name="province_id" onchange="get_wilayah_prov('kab_kot',this.value)" required>
                                             
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="kab_kot" style="color:black">Kabupaten / Kota</label>
                                        <select id="kab_kot" style="width: 100%;" class="form-control select2" name="city_id" onchange="get_wilayah_prov('kec',this.value)">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="" style="color:black">Kecamatan</label>
                                        <select id="kec" style="width: 100%;" class="form-control select2" name="district_id" onchange="get_wilayah_prov('kel',this.value)">
                                           
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="" style="color:black">Kelurahan</label>
                                        <select id="kel" style="width: 100%;" class="form-control select2" name="village_id" >
                                           
                                        </select>
                                        {{-- <input type="text" placeholder="" class="form-control" id="" name="" > --}}
                                    </div>
                                </div>

                               <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="email" style="color:black">Email*</label>
                                        <div class="inputcontainer">
                                            <input type="text" placeholder="Your Email" class="form-control" id="email" name="admin_email" onchange="checkDataExisting('admin_email',this.value)" required>
                                            <div class="icon-container">
                                                <i class="loader" id="loader_admin_email" style="display: none"></i>
                                                <svg class="checkmark" id="success_admin_email" style="display: none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                </svg>
                                                <svg class="checkmark1" id="error_admin_email" style="display: none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle1" cx="26" cy="26" r="25" fill="none" />
                                                    <path class="checkmark__circle1" fill="none" d="M16 16 36 36 M36 16 16 36" />
                                                </svg>
                                            </div>
                                        </div>
                                        <span id="ket_admin_email" style="font-size:11px; color:red"></span>
                                    </div>
                                    <div class="col">
                                        <label for="email" style="color:black">Email Alternatif*</label>
                                        <div class="inputcontainer">
                                            <input type="text" placeholder="Your Email" class="form-control" id="email_alternatif" name="alternate_email" onchange="checkDataExisting('alternatif_email',this.value)" required>
                                            <div class="icon-container">
                                                <i class="loader" id="loader_alternatif_email" style="display: none"></i>
                                                <svg class="checkmark" id="success_alternatif_email" style="display: none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                </svg>
                                                <svg class="checkmark1" id="error_alternatif_email" style="display: none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle1" cx="26" cy="26" r="25" fill="none" />
                                                    <path class="checkmark__circle1" fill="none" d="M16 16 36 36 M36 16 16 36" />
                                                </svg>
                                            </div>
                                        </div>
                                        <span id="ket_alternatif_email" style="font-size:11px; color:red"></span>
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="nm_admin" style="color:black">Nama Admin</label>
                                        <input type="text" placeholder="" class="form-control" id="nm_admin" name="admin_contact_name">
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:108px">
                                    <div class="col">
                                        <label for="password" style="color:black">Telephone</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="admin_phone" >
                                    </div>
                                    <div class="col">
                                        <label for="confirm_password" style="color:black">Kode Pos</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="kodepos">
                                    </div>
                                </div>

                                <p>(*) Mandatory</p>
                            </section>
                            <h3>Tambahan</h3>
                            <section>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label for="" style="color:black">Admin Alternatif</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="alternate_contact_name"   >
                                    </div>
                                    <div class="form-holder">
                                        <label for="" style="color:black">Telephone Alternatif</label>
                                        <input type="" placeholder="" class="form-control" id="" name="alternate_phone"  >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="website" style="color:black">Website</label>
                                        <input type="text" placeholder="Website" class="form-control" id="website" name="website_url" required >
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

        // document.querySelector(".form_button").addEventListener("click",function(){
        //     let inputcaptchavalue = document.querySelector("#captcha input").value;

        //     if (inputcaptchavalue === captchaValue) 
        //     {
        //         // swal("","Log in","success");
        //         alert("Log in success");
        //     }
        //     else
        //     {
        //         // swal("Invalid Captcha");
        //         alert("Invalid Captcha");
        //     }
        // });
    })();
</script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // validasi kategori penerbit
    function kat_penerbit(radio) {
        if (radio.value == 'pemerintah') {
            document.getElementById('form-akta').style.display = 'none';
        } else {
            document.getElementById('form-akta').style.display = 'block';
        }
    }
    //select2 pemilihan wilayah
    $(function () {
        $('.select2').select2()
    })
    //select2 first load
    document.addEventListener('DOMContentLoaded', (event) => {
        $.ajax({
            url: '/get_wilayah',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function(data) {
                var selectElement = document.getElementById('provinsi');
                // Use forEach to loop through each item in the array
                var defaultOption = document.createElement('option');
                defaultOption.text = 'Pilih Wilayah';
                defaultOption.value = ''; 
                defaultOption.disabled = true; 
                defaultOption.selected = true; 
                selectElement.add(defaultOption);

                data.forEach(function(item) {
                    // Create a new option element
                    var newOption = document.createElement('option');
                    newOption.text = item.NAMAPROPINSI;
                    newOption.value = item.ID;

                    // Add the option to the select element
                    selectElement.add(newOption);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown);
            }
        })
    })
    //get kabupaten -> kec -> kel
    function get_wilayah_prov(name, value) {
        //condition req data 
        if (name == 'kab_kot') {
            var req_data = { 'kab_kot' : value }
            var item_var = 'NAMAKAB'
        }else if(name == 'kec') {
            var req_data = { 'kec' : value }
            var item_var = 'NAMAKEC'
        } else if(name ==  'kel'){
            var req_data = { 'kel' : value }
            var item_var = 'NAMAKEL'
        } else {
            var req_data = {} 
            var item_var = 'NAMAPROPINSI'
        }
        //get api data berdasarkan filter req
        $.ajax({
            url: '/get_wilayah',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            data: req_data,
            success: function(data) {
                var selectElement = document.getElementById(name);
                // Clear existing options
                selectElement.innerHTML = '';
                // Tambahkan opsi default "Pilih Wilayah"
                var defaultOption = document.createElement('option');
                defaultOption.text = 'Pilih Wilayah';
                defaultOption.value = ''; 
                defaultOption.disabled = true; 
                defaultOption.selected = true; 
                selectElement.add(defaultOption);
                // Use forEach to loop through each item in the array
                data.forEach(function(item) {
                    // Create a new option element
                    var newOption = document.createElement('option');
                    newOption.text = item[item_var];
                    newOption.value = item.ID;
                    // Add the option to the select element
                    selectElement.add(newOption);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown);
            }
        })
    }
    //end pemilihan wilayah
    //check data existing username and email
    function checkDataExisting(name, value) {
        //loader
        document.getElementById('error_'+name).style.display = 'none';
        document.getElementById('success_'+name).style.display = 'none';
        document.getElementById('loader_'+name).style.display = 'block';
        //end loader

        var validate = ''
        if (name == 'username') {
            var req_data = { 'username' : value }
            validate = validasi_username(value)
        } else if (name == 'admin_email') {
            var req_data = { 'admin_email' : value }
        } else {
            var req_data = { 'alternatif_email' : value }
        }
        

        if (validate != 'error') {
            $.ajax({
                url: '/checking_data_existing',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                serverSide: true,
                data: req_data,
                success: function(data) {
                    if (data.length > 0) {
                        document.getElementById('loader_'+ name).style.display = 'none';
                        document.getElementById('error_'+ name).style.display = 'block';
                        document.getElementById('ket_'+ name).innerHTML = name +'sudah digunakan'
                        // alert( name +'sudah digunakan')
                        //nanti harus dikasih validasi tidak bisa next jika sudah digunakan
                    } else {
                        // alert('bisa digunakan')
                        document.getElementById('loader_'+ name).style.display = 'none';
                        document.getElementById('success_'+ name).style.display = 'block';
                        document.getElementById('ket_'+ name).style.display = 'none';
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown); // Log any errors
                }
            });
        }
    }
    // END check data existing username and email
    //validasi username
    function validasi_username(username) {
        var errorMessage = '';
        // Check if the username contains only letters and numbers
        var validUsername = /^[a-zA-Z0-9]+$/.test(username);
        if (!validUsername) {
            errorMessage = 'Username tidak boleh mengandung spasi atau karakter khusus.';
        }
        // Check if the username has at least 6 characters
        if (username.length < 6) {
            errorMessage = 'Username harus memiliki minimal 6 karakter.';
        }

        if (errorMessage) {
            document.getElementById('loader_username').style.display = 'none';
            document.getElementById('error_username').style.display = 'block';
            document.getElementById('ket_username').innerHTML = errorMessage;
            return 'error';
        } else {
            return 'success';
        }        
    }
    //end validasi username
    //validasi password
    function validasi_password(value) {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/;
        if (passwordRegex.test(value)) {
            document.getElementById('ket_password').style.display = 'none';
        } else {
            document.getElementById('ket_password').style.display = 'block';
            document.getElementById('ket_password').innerHTML = 'Password harus terdiri dari setidaknya 8 karakter, mengandung huruf besar dan kecil, angka, dan karakter khusus.';
        }
    }
    //end validasi password
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
            document.getElementById('loader_page').style.display = 'block';
            document.getElementById('contact').style.display = 'none';
            
            $('#contact').append('<input type="hidden" id="" name="nama_kota" value="' + $('#kab_kot option:selected').text() + '">');
            $.ajax({
                url: '/submit_pendaftaran',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: $('#contact').serialize(),
                success: function(data) {
                    document.getElementById('loader_page').style.display = 'none';
                    console.log(data, 'hakim data submit')
                    // alert("Submitted!");
                    openNewWindowWithParams()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown);
                }
            })
        }
    });

    //redirect verifikasi halaman input otp
    function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    }
    function openNewWindowWithParams() {
        // URL of the new window
        const url = "/verifikasi_pendaftaran";

        // Create a form element
        const form = document.createElement("form");
        form.setAttribute("method", "POST");
        form.setAttribute("action", url);

        // Create hidden input fields for the parameters
        const params = {
            'admin_email': $('#email').val(),
            'user_name': $('#username').val()
        };

        for (const key in params) {
            if (params.hasOwnProperty(key)) {
                const hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        // Add CSRF token
        const csrfToken = getCsrfToken();
        const csrfField = document.createElement("input");
        csrfField.setAttribute("type", "hidden");
        csrfField.setAttribute("name", "_token");
        csrfField.setAttribute("value", csrfToken);
        form.appendChild(csrfField);

        // Append the form to the body
        document.body.appendChild(form);
        // Submit the form
        form.submit();

        // Remove the form from the DOM after submitting
        document.body.removeChild(form);
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    //upload file  file_pernyataan
    Dropzone.autoDiscover = false;
    var dropzone1 = new Dropzone("#dropzone1", {
        url: '/projects/media-one',
        paramName: "file",
        maxFiles: 1,
        maxFilesize: 2, // MB
        acceptedFiles: ".pdf",
        autoProcessQueue: false,
        addRemoveLinks: true, // Option to remove files from the dropzone
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token for Laravel
        },
        init: function() {
            this.on("addedfile", function(file) {
                // Automatically process the file when it is added
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
                
                dropzone1.processFile(file);
            });
            this.on("sending", function(file, xhr, formData) {
                // Additional data can be sent here if required
                console.log('Sending file:', file);
            });
            this.on("success", function(file, response) {
                $('#contact').append('<input type="hidden" id="file_pernyataan" name="file_surat_pernyataan" value="' + response[0]['name'] + '">');
                // Handle the response from the server after the file is uploaded
                console.log('File uploaded successfully', response);
            });
            this.on("error", function(file, response) {
                // Handle the errors
                console.error('Upload error', response);
            });
            this.on("queuecomplete", function() {
                // Called when all files in the queue have been processed
                console.log('All files have been uploaded');
            });
            this.on("removedfile", function(file) {
                console.log(file, 'hakim delete', file.serverFileName)
                if (file.serverFileName) {
                    $.ajax({
                        url: '/projects/media/delete',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { 
                            filename: file.serverFileName[0]['name']
                        },
                        success: function(data) {
                            $('#file_pernyataan').remove();
                            console.log("File deleted successfully");
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error('Failed to delete file:', errorThrown);
                        }
                    });
                }
            });
            this.on("success", function(file, response) {
                // Store the server file name for deletion purposes
                file.serverFileName = response;
            });
        }
       
    });
    //upload file  file_akta
    var dropzone2 = new Dropzone("#dropzone2", {
        url: '/projects/media-one',
        paramName: "file",
        maxFiles: 1,
        maxFilesize: 2, // MB
        acceptedFiles: ".pdf",
        autoProcessQueue: false,
        addRemoveLinks: true, // Option to remove files from the dropzone
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token for Laravel
        },
        init: function() {
            this.on("addedfile", function(file) {
                // Automatically process the file when it is added
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
                
                dropzone2.processFile(file);
            });
            this.on("sending", function(file, xhr, formData) {
                // Additional data can be sent here if required
                console.log('Sending file:', file);
            });
            this.on("success", function(file, response) {
                $('#contact').append('<input type="hidden" id="file_akta" name="file_akte_notaris" value="' + response[0]['name'] + '">');
                // Handle the response from the server after the file is uploaded
                console.log('File uploaded successfully', response);
            });
            this.on("error", function(file, response) {
                // Handle the errors
                console.error('Upload error', response);
            });
            this.on("queuecomplete", function() {
                // Called when all files in the queue have been processed
                console.log('All files have been uploaded');
            });
            this.on("removedfile", function(file) {
                if (file.serverFileName) {
                    $.ajax({
                        url: '/projects/media/delete',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { 
                            filename: file.serverFileName[0]['name']
                        },
                        success: function(data) {
                            $('#file_akta').remove();
                            console.log("File deleted successfully");
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error('Failed to delete file:', errorThrown);
                        }
                    });
                }
            });
            this.on("success", function(file, response) {
                // Store the server file name for deletion purposes
                file.serverFileName = response;
            });
        }
    });
</script>
@endpush
