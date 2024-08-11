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
                    <form id="contact" action="#">
                        <div>
                            <h3>Penerbit</h3>
                            <section>
                                
                                <label for="name">Penerbit  *</label> <br>
                                <label>
                                    <input type="radio" id="swasta" value="swasta" onclick="kat_penerbit(this)" name="kategori_penerbit"/>
                                    <span>Lembaga Swasta</span>
                                </label><br>
                                <label>
                                    <input type="radio" id="pemerintah" value="pemerintah" onclick="kat_penerbit(this)" name="kategori_penerbit"/>
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
                                <div class="form-row row" style="margin-top:10%">
                                    <div class="col">
                                        <label for="penerbit" style="color:black">Penerbit*</label>
                                        <input type="text" placeholder="" class="form-control" id="penerbit" name="name"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="username" style="color:black">Username*</label>
                                        <input type="text" placeholder="Username" class="form-control" onchange="checkDataExisting('username',this.value)" id="username" name="isbn_user_name">
                                    </div>
                                </div>    

                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="password" style="color:black">Password*</label>
                                        <input type="password" placeholder="Password" class="form-control" id="password" name="isbn_password">
                                    </div>
                                    <div class="col">
                                        <label for="confirm_password" style="color:black">Confirm Password*</label>
                                        <input type="password" placeholder="" class="form-control" id="confirm_password" name="isbn_password2"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="nm_gedung" style="color:black">Nama Gedung (jika ada)</label>
                                        <input type="text" placeholder="" class="form-control" id="nm_gedung" name="nama_gedung"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="nm_jalan" style="color:black">Nama Jalan*</label>
                                        <input type="text" placeholder="" class="form-control" id="nm_jalan" name="alamat"  >
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="provinsi" style="color:black">provinsi*</label>
                                        <select id="provinsi" style="width: 100%;" class="form-control select2" name="province_id" onchange="get_wilayah_prov('kab_kot',this.value)">
                                             
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="kab_kot" style="color:black">Kabupaten / Kota</label>
                                        <select id="kab_kot" style="width: 100%;" class="form-control select2" name="city_id" onchange="get_wilayah_prov('kec',this.value)">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
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

                               <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="email" style="color:black">Email*</label>
                                        <input type="text" placeholder="Your Email" class="form-control" id="email" name="email1" onchange="checkDataExisting('admin_email',this.value)">
                                    </div>
                                    <div class="col">
                                        <label for="email" style="color:black">Email Alternatif*</label>
                                        <input type="text" placeholder="Your Email" class="form-control" id="email" name="email2" onchange="checkDataExisting('alternatif_email',this.value)">
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="nm_admin" style="color:black">Nama Admin</label>
                                        <input type="text" placeholder="" class="form-control" id="nm_admin" name="kontak1">
                                    </div>
                                </div>
                                <div class="form-row row" style="margin-top:14%">
                                    <div class="col">
                                        <label for="password" style="color:black">Telephone</label>
                                        <input type="text" placeholder="" class="form-control" id="" name="telp1" >
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
                                        <input type="text" placeholder="" class="form-control" id="" name="kontak2"   >
                                    </div>
                                    <div class="form-holder">
                                        <label for="" style="color:black">Telephone Alternatif</label>
                                        <input type="" placeholder="" class="form-control" id="" name="telp2"  >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="website" style="color:black">Website</label>
                                        <input type="text" placeholder="Website" class="form-control" id="website" name="website"  >
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
        if (name == 'username') {
            var req_data = { 'username' : value }
        } else if (name == 'admin_email') {
            var req_data = { 'admin_email' : value }
        } else {
            var req_data = { 'alternatif_email' : value }
        }
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
                    alert( name +'sudah digunakan')
                    //nanti harus dikasih validasi tidak bisa next jika sudah digunakan
                } else {
                    alert('bisa digunakan')
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown); // Log any errors
            }
        });
    }
    // END check data existing username and email
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

{{-- //form submit --}}
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
            $('#contact').append('<input type="hidden" name="provinsi" value="' + $('#provinsi option:selected').text() + '">');
            $('#contact').append('<input type="hidden" name="city" value="' + $('#kab_kot option:selected').text() + '">');
           
            //ajax submit
            $.ajax({
                url: '/submit_pendaftaran',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: $('#contact').serialize(),
                success: function(data) {
                    
                    console.log(data, 'hakim data submit')
                    alert("Submitted!");

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown);
                }
            })

        }
    });
</script>

{{-- dropzone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    //upload file 
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
                $('#contact').append('<input type="hidden" id="file_pernyataan" name="file_sp" value="' + response[0]['name'] + '">');
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
