@extends('index')
@section('content')

<style>
    .progress-container {
  position: relative;
}

.progress-bar {
}

.progress-bar:before {
  content: "0";
  position: absolute;
  left: 2px;
  bottom: 60px;
  font-size: 12px;
  color: rgba(98, 107, 114, 1);
}

.progress-bar:after {
  content: "600";
  position: absolute;
  right: -6px;
  bottom: 60px;
  font-size: 12px;
  color: rgba(98, 107, 114, 1);
}

.widget {
  padding: 25px;
  margin: 0 auto;
  width: 150px;
  margin-top: 25px;
  background-color: #fff;
  -background-color: #222d3a;
  border-radius: 5px;
  box-shadow: 1px 1px 4px 0px rgba(0, 0, 0, 0.3);
  position: relative;
}

.points {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  bottom: 60px;
  text-align: center;
  text-transform: uppercase;
  color: rgba(98, 107, 114, 1);
  font-size: 12px;
}
</style>

<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-12 mx-auto">
                <h1 class="text-white text-center">Statistik</h1>
                <h6 class="text-white text-center">International Standard Book Number</h6>
            </div>
        </div>
    </div>
</section>

<section class="featured-section">
    <div class="container" >
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                <div class="custom-block bg-white shadow-lg">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-2">Pendahuluan</h5>
                            <p class="mb-0">
                                Informasi tentang Prosedur Pendaftaran Penerbit dan Permohonan ISBN
                            </p>
                            <p> Perpustakaan Nasional RI Sebagai badan yang ditunjuk oleh International ISBN Agency untuk mengelola International Standard Book Number (ISBN) di Indonesia sejak tahun 1986, telah menjalankan tugasnya mengelola dan mendistribusikan penomoran ISBN kepada seluruh penerbit yang ada di wilayah negara kesatuan Republik Indonesia. 
                                Indonesia sudah tiga kali menerima Group Identifier, yaitu 979 pada tahun 1985, 602 pada tahun 2003 dan 623 pada tahun 2018. Berikut Struktur ISBN untuk Indonesia
                                stat_1
                                Berdasarkan block number tersebut, Perpustakaan Nasional RI sudah mendistribusikan registrant element dan rentang ISBN, sebanyak :
                                stat_1
                                Data ini menunjukkan bahwa penerbit Indonesia sudah menggunakan 13.510 registrant elemant pada group identifier 979, dan 24.607 registrant element pada group identifier 602. Sedangkan penggunaan registrant element pada block number 623 belum menjadi hitungan karena masih terus dikembangkan bersamaan dengan kondisi penerbitan di Indonesia. Jika diperhatikan, sejak diterapkannya sistem ISBN di Indonesia sejak tahun 1986, penerbit di Indonesia telah menerbitkan buku sebanyak 2.000.000 judul buku ber-ISBN (diluar hitungan buku berjilid)
                                Layanan pengurusan ISBN Perpustakaan Nasional RI telah memenuhi persyaratan SNI ISO 9001 : 2015 dan terdaftar dalam MUTU Certification. Berdasarkan Surat edaran Kepala Direktorat Deposit Bahan Pustaka Perpustakaan Nasional RI no. 224/3.1/DBP.05/II.2018, berlaku mulai April 2018 layanan ISBN dinyatakan online dan tidak ada lagi pengajuan ISBN secara onsite.
                                Perpustakaan Nasional RI berusaha menyediakan informasi hasil layanan ISBN secara terbuka dan real time. Layanan tersebut merupakan pertanggungjawaban lembaga dalam mewujudkan layanan publik yang transparan dan akuntabel.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- terbitan isbn -->
<section class="explore-section">
    <div class="container" >
        <div class="col-12 text-center">
            <h2 class="mt-5 mb-4">Grafik Statistik</h1>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-3 text-center">Data Terbitan terbanyak </h5>
                                        <p class="mb-0 text-center">
                                            Daftar 10 kota teratas Data Terbitan terbanyak. Dengan total data 80.000 dari 10 kota teratas
                                        </p>
                                    </div>
                                </div>
                                <div id='terbitan_terbanyak'></div>
                                <p class="mb-0 text-center" >
                                    data terakhir pada pukul 13.13
                                </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-3 text-center">Data Kota penerbit terbanyak </h5>
                                        <p class="mb-0 text-center">
                                            Daftar 10 kota teratas Data kota penerbit terbanyak. Dengan total data 80.000 dari 10 kota teratas
                                        </p>
                                    </div>
                                </div>
                                <div id='kota_penerbit_terbanyak'></div>
                                <p class="mb-0 text-center">
                                    Data terakhir pada pukul 13.13
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- grafik  isbn -->
<section>
    <div class="container mb-4" >
        <div class="col-12 text-center d-flex justify-content-between gap-3">
            <div class="col-lg-12 col-md-12 col-12 mb-12 mb-lg-12">
                <div class="custom-block bg-white shadow-lg">
                    <div class="d-flex">
                        <div>
                            <h5 class="mb-0 text-center">Data ISBN </h5>
                            <p class="mb-0 text-center">
                                Informasi tentang Data ISBN yang sudah didaftaran berdasarkan <span id="ket_dt_isbn"></span>
                            </p>
                        </div>
                    </div>
                    <canvas id="barChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- terbitan isbn perprovinsi/kota-->
<section>
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-3 text-center">Data ISBN </h5>
                                        <p class="mb-0 text-center">
                                            Total Data ISBN Per Provinsi
                                        </p>
                                    </div>
                                </div>
                                <div class="progress-bar" id="loyalty">
                                    <div class="points">points</div>
                                </div>
                                <p class="mb-0 text-center" >
                                    data terakhir pada pukul 13.13
                                </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-3 text-center">Data Kota penerbit terbanyak </h5>
                                        <p class="mb-0 text-center">
                                            Daftar 10 kota teratas Data kota penerbit terbanyak. Dengan total data 80.000 dari 10 kota teratas
                                        </p>
                                    </div>
                                </div>
                                <!-- <div id='kota_penerbit_terbanyak'></div> -->
                                <p class="mb-0 text-center">
                                    Data terakhir pada pukul 13.13
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<script src= "https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetchTerbitan()
        fetctKotaTerbit()
        fetchDataIsbn(null)
        isbn_chart()
    })

    function fetchTerbitan() {
        $.ajax({
            url: '/kota_terbitan_terbanyak', // Replace with your API endpoint
            type: 'GET', // Or 'POST' depending on your API
            dataType: 'json',
            processing: true, // Show processing indicator
            serverSide: true, // Enable server-side proces
            success: function(response) {
                updateChart(response.content);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
    function updateChart(seriesData) {
        var chart_terbitan = {
        "type":"pie",
        "legend":{
            "x":"70%",
            "y":"15%",
            "border-width":1,
            "border-color":"gray",
            "border-radius":"5px",
            "header":{
                "text":"Notations",
                "font-family":"Georgia",
                "font-size":12,
                "font-color":"#3333cc",
                "font-weight":"normal"
            },
            "marker":{
                "type":"circle"
            },
            "toggle-action":"remove",
            "minimize":true,
            "icon":{
            "line-color":"#9999ff"
            },
            "max-items":10,
            "overflow":"scroll"
        },
        "plotarea":{
            "margin-right":"30%",
        },
        "plot":{
            "animation":{
                "on-legend-toggle": true, //set to true to show animation and false to turn off
                "effect": 10,
                "method": 1,
                "sequence": 1,
                "speed": 1
            },
            "value-box":{
                "text":"%npv%",
                "font-size":12,
                "font-family":"Georgia",
                "font-weight":"normal",
                "placement":"out",
                "font-color":"gray",
            },
            "tooltip":{
                "text":"%t: %v (%npv%)",
                "font-color":"black",
                "font-family":"Georgia",
                "text-alpha":1,
                "background-color":"white",
                "alpha":0.7,
                "border-width":1,
                "border-color":"#cccccc",
                "line-style":"dotted",
                "border-radius":"10px",
                "padding":"10%",
                "placement":"node:center"
            },
            "border-width":1,
            "border-color":"#cccccc",
            "line-style":"dotted"
        },
        "series": seriesData
        };

        zingchart.render({ 
            id : 'terbitan_terbanyak', 
            data : chart_terbitan, 
            height: 500, 
            width: "100%" 
        });
    }

    function fetctKotaTerbit() {
        $.ajax({
            url: '/kota_penerbit_terbanyak', // Replace with your API endpoint
            type: 'GET', // Or 'POST' depending on your API
            dataType: 'json',
            processing: true, // Show processing indicator
            serverSide: true, // Enable server-side proces
            success: function(response) {
                kotaPenerbit(response.content);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
    //set data grafik
    function kotaPenerbit(seriesData) {
        var chart_kota_penerbit = {
        "type":"pie",
        "legend":{
            "x":"70%",
            "y":"15%",
            "border-width":1,
            "border-color":"gray",
            "border-radius":"5px",
            "header":{
                "text":"Notations",
                "font-family":"Georgia",
                "font-size":12,
                "font-color":"#3333cc",
                "font-weight":"normal"
            },
            "marker":{
                "type":"circle"
            },
            "toggle-action":"remove",
            "minimize":true,
            "icon":{
            "line-color":"#9999ff"
            },
            "max-items":10,
            "overflow":"scroll"
        },
        "plotarea":{
            "margin-right":"30%",
        },
        "plot":{
            "animation":{
                "on-legend-toggle": true, //set to true to show animation and false to turn off
                "effect": 10,
                "method": 1,
                "sequence": 1,
                "speed": 1
            },
            "value-box":{
                "text":"%npv%",
                "font-size":12,
                "font-family":"Georgia",
                "font-weight":"normal",
                "placement":"out",
                "font-color":"gray",
            },
            "tooltip":{
                "text":"%t: %v (%npv%)",
                "font-color":"black",
                "font-family":"Georgia",
                "text-alpha":1,
                "background-color":"white",
                "alpha":0.7,
                "border-width":1,
                "border-color":"#cccccc",
                "line-style":"dotted",
                "border-radius":"10px",
                "padding":"10%",
                "placement":"node:center"
            },
            "border-width":1,
            "border-color":"#cccccc",
            "line-style":"dotted"
        },
        "series": seriesData
        };

        zingchart.render({ 
            id : 'kota_penerbit_terbanyak', 
            data : chart_kota_penerbit, 
            height: 500, 
            width: "100%" 
        });
    }   

    function fetchDataIsbn(params) {
        $.ajax({
            url: '/isbn_periode', // Replace with your API endpoint
            type: 'GET', // Or 'POST' depending on your API
            dataType: 'json',
            processing: true, // Show processing indicator
            serverSide: true, // Enable server-side proces
            success: function(response) {
                console.log(response.content,'hakim ')
                dataIsbn(response.content);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
    function dataIsbn(data){
        var canvas = document.getElementById("barChart");
        var ctx = canvas.getContext("2d");

        // Global Options:
        Chart.defaults.global.defaultFontColor = "#2097e1";
        Chart.defaults.global.defaultFontSize = 11;

        // Data with datasets options
        var data = {
            labels: data.label,
            datasets: [
                {
                    label: "Judul",
                    fill: true,
                    backgroundColor: [
                        "#2097e1",
                        "#2097e1",
                        "#2097e1",
                        "#2097e1",
                        "#2097e1",
                        "#2097e1",
                    ],
                    data: data.judul
                },
                {
                    label: "ISBN",
                    fill: true,
                    backgroundColor: [
                        "#bdd9e6",
                        "#bdd9e6",
                        "#bdd9e6",
                        "#bdd9e6",
                        "#bdd9e6",
                        "#bdd9e6"
                    ],
                    data: data.isbn
                }
            ]
        };

        // Notice how nested the beginAtZero is
        var options = {
            title: {
                display: true,
                text: "Data ISBN per tahun/bulan",
                position: "bottom"
            },
            scales: {
                xAxes: [
                    {
                        gridLines: {
                            display: true,
                            drawBorder: true,
                            drawOnChartArea: false
                        }
                    }
                ],
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                ]
            }
        };

        // added custom plugin to wrap label to new line when \n escape sequence appear
        var labelWrap = [
            {
                beforeInit: function (chart) {
                    chart.data.labels.forEach(function (e, i, a) {
                        if (/\n/.test(e)) {
                            a[i] = e.split(/\n/);
                        }
                    });
                }
            }
        ];

        // Chart declaration:
        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options,
            plugins: labelWrap
        });
    }


    function isbn_chart() {
        var points = 450;
var maxPoints = 600;
var percent = points / maxPoints * 100;
var ratio = percent / 100;
var pie = d3.layout
  .pie()
  .value(function(d) {
    return d;
  })
  .sort(null);
var w = 150,
  h = 150;
var outerRadius = w / 2 - 10;
var innerRadius = 75;
var color = ["#ececec", "rgba(156,78,176,1)", "#888888"];
var colorOld = "#F00";
var colorNew = "#0F0";
var arc = d3.svg
  .arc()
  .innerRadius(innerRadius)
  .outerRadius(outerRadius)
  .startAngle(0)
  .endAngle(Math.PI);

var arcLine = d3.svg
  .arc()
  .innerRadius(innerRadius)
  .outerRadius(outerRadius)
  .startAngle(0);

var svg = d3
  .select("#loyalty")
  .append("svg")
  .attr({
    width: w,
    height: h,
    class: "shadow"
  })
  .append("g")
  .attr({
    transform: "translate(" + w / 2 + "," + h / 2 + ")"
  });

var path = svg
  .append("path")
  .attr({
    d: arc,
    transform: "rotate(-90)"
  })
  .style({
    fill: color[0]
  });

var pathForeground = svg
  .append("path")
  .datum({ endAngle: 0 })
  .attr({
    d: arcLine,
    transform: "rotate(-90)"
  })
  .style({
    fill: function(d, i) {
      return color[1];
    }
  });

var middleCount = svg
  .append("text")
  .datum(0)
  .text(function(d) {
    return d;
  })
  .attr({
    class: "middleText",
    "text-anchor": "middle",
    dy: 0,
    dx: 5
  })
  .style({
    fill: d3.rgb("#000000"),
    "font-size": "36px"
  });

var oldValue = 0;
var arcTween = function(transition, newValue, oldValue) {
  
  transition.attrTween("d", function(d) {
    var interpolate = d3.interpolate(d.endAngle, Math.PI * (newValue / 100));
    var interpolateCount = d3.interpolate(oldValue, newValue);

    return function(t) {
      d.endAngle = interpolate(t);
      // change percentage to points before rendering text
      middleCount.text(Math.floor(interpolateCount(t)/100*maxPoints));

      return arcLine(d);
    };
  });
};

pathForeground
  .transition()
  .duration(750)
  .ease("cubic")
  .call(arcTween, percent, oldValue, points);
    }
    

</script>


