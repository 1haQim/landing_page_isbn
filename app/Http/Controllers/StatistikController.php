<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatistikController extends Controller
{
    function index() {
        return view('content.statistik');
    }

    function kota_terbitan_terbanyak() {
        $query = "SELECT 
            tempat_terbit, 
            jumlah
        FROM (
            SELECT 
                penerbit_terbitan.tempat_terbit, 
                COUNT(*) AS jumlah 
            FROM 
                penerbit_terbitan 
            WHERE 
                penerbit_terbitan.tempat_terbit IS NOT NULL
            GROUP BY 
                penerbit_terbitan.tempat_terbit 
            ORDER BY 
                jumlah DESC
        )
        WHERE ROWNUM <= 10";
        //get api dan olah data

        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');

            if ($data['Status'] == "Error") {
                return errorResponseWithContent(message: 'error - kota terbitan', content : $data['Message']);
            } else {
                $arr_color = [
                    "#cc0000","#ff3300","#ff6600","#ff9933","#ffcc00","#a2c2e4","#e49382","#8dcf8d","#cda4d6","#8bb4d9",
                ];
                $data_chart = [];
                foreach ($$data['Data']['Items'] as $k => $v) {
                    $color = $arr_color[$k];
                    $data_chart[] = [
                        'values' => [(int) $v['JUMLAH']],
                        'background-color' => $color,
                        'text' => $v['TEMPAT_TERBIT'].'<br> Total : '. $v['JUMLAH'] ,
                    ];
                }

                return successResponse(content : $data_chart);
            }
        } catch (Exception $e) {
            return errorResponseWithContent(content : $e->getMessage());
        }
    }

    function kota_penerbit_terbanyak() {
        $query = "SELECT 
            city, 
            jumlah
        FROM (
            SELECT 
                penerbit.city, 
                COUNT(*) AS jumlah 
            FROM 
                penerbit 
            WHERE 
                penerbit.city IS NOT NULL
            GROUP BY 
                penerbit.city 
            ORDER BY 
                jumlah DESC
        )
        WHERE ROWNUM <= 10";

        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');

            if ($data['Status'] == "Error") {
                return errorResponseWithContent(message: 'error - fetch kota penerbit', content : $data['Message']);
            } else {
                //generate to data grafik
                $arr_color = [
                    "#cc0000","#ff3300","#ff6600","#ff9933","#ffcc00","#a2c2e4","#e49382","#8dcf8d","#cda4d6","#8bb4d9",
                ];
                $data_chart = [];
                foreach ($data['Data']['Items'] as $k => $v) {
                    $color = $arr_color[$k];
                    $data_chart[] = [
                        'values' => [(int) $v['JUMLAH']],
                        'background-color' => $color,
                        'text' => $v['CITY'].'<br> Total : '. $v['JUMLAH'] ,
                    ];
                }
                //response
                return successResponse(content : $data_chart);
            }
        } catch (Exception $e) {
            return errorResponseWithContent(content : $e->getMessage());
        }
    }

    function isbn_periode(Request $request) {
        $periode = "'YYYY'";
        $where = ''; 
        $order1 = "ORDER BY TO_NUMBER(periode) DESC";
        $order2 = "ORDER BY TO_NUMBER(periode) ASC"; 

        //jika memilih periode bulan
        if ($request->query('periode') == 'bulan') {
            $periode = "'YYYY-MM'";
            $where = " WHERE to_char(penerbit_isbn.createdate,'YYYY') = '".$request->query('tahun')."'";
            $order1 = " ORDER BY periode";
            $order2 = " ORDER BY periode ASC";
        } 

        $query = "SELECT * 
        FROM (
            SELECT 
                TO_CHAR(penerbit_isbn.createdate, $periode) AS periode, 
                COUNT(DISTINCT penerbit_terbitan_id) AS jumlah_judul, 
                COUNT(1) AS jumlah_isbn 
            FROM 
                penerbit_isbn 
            $where
            GROUP BY 
                TO_CHAR(penerbit_isbn.createdate, $periode)
            $order1
        )
        WHERE ROWNUM <= 6
        $order2";

        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');

            dd($data);

            if ($data['Status'] == "Error") {
                return errorResponseWithContent(message: 'error - get data periode', content : $data['Message']);
            } else {
                $dataChart = [];
                foreach ($data['Data']['Items'] as $k => $v) {
                    $dataChart['label'][] = $v['PERIODE'];
                    $dataChart['judul'][] = $v['JUMLAH_JUDUL'];
                    $dataChart['isbn'][] = $v['JUMLAH_ISBN'];
                }

                return successResponse(content : $dataChart);
            }
        } catch (Exception $e) {
            return errorResponseWithContent(content : $e->getMessage());
        }
    }

    function isbn_wilayah(Request $request) {
        $where = " WHERE penerbit.province_id = ".$request->query('id');
        //jika memilih wilayah kota
        if ($request->query('wilayah') == 'kota') {
            $where = " WHERE penerbit.city_id = ".$request->query('id');
        } 

        $query = "SELECT COUNT(1) AS jumlah
            FROM penerbit_isbn
            INNER JOIN penerbit ON penerbit_isbn.penerbit_id = penerbit.id
            $where
            AND TO_CHAR(penerbit_isbn.createdate, 'YYYY') = '".$request->query('tahun')."'";
        
        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');

            if ($data['Status'] == "Error") {
                return errorResponseWithContent(message: 'error - get data periode', content : $data['Message']);
            } else {
                return successResponse(content : $data['Data']['Items']);
            }
        } catch (Exception $e) {
            return errorResponseWithContent(content : $e->getMessage());
        }
    }

}
