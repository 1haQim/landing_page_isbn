<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class PencarianController extends Controller
{
    function index() {

        $kotaPopuler = $this->kota_penerbit_terbanyak();
        $penerbitPopuler = $this->penerbit_terbanyak();

        return view('content.pencarian',compact('kotaPopuler','penerbitPopuler'));
    }

    //serverside
    function search(Request $request) {
        
        $start = $request->input('page'); // Offset (start of the records for the current page)
        $length = $request->input('pageSize');

        $keyword = $request->input('search');
        $filter_by = $request->input('filter_by'); // Search filter

        $where = '';
        if ($filter_by == 'all' && $keyword != "") {
            $keyword = strtoupper($keyword); //upper
            $where = "WHERE UPPER(PI.ISBN_NO) LIKE '%".$keyword."%' OR UPPER(PT.TITLE) LIKE '%".$keyword."%' OR UPPER(PT.KEPENG) LIKE '%".$keyword."%' OR UPPER(P.NAME) LIKE '%".$keyword."%'";
        } else if($filter_by && $keyword != "") {
            $keyword = strtoupper($keyword); //upper
            $where = "WHERE UPPER($filter_by) LIKE '%".$keyword."%'"; //filterby ambil dari params filter dihome
        } else {
            $where = '';
        }

        //filter dari halaman pencarian 
        $by_penerbit = strtoupper($request->input('by_penerbit'));
        $by_kota = strtoupper($request->input('by_kota'));

        //validasi 
        $operator = $where != "" ? "AND " : "WHERE ";
        if ($by_penerbit && $by_kota) {
            $where = $where . "$operator UPPER(P.NAME) ='$by_penerbit' AND UPPER(PT.TEMPAT_TERBIT) = '$by_kota'";
        } else if ($by_penerbit){
            $where = $where . " $operator UPPER(P.NAME) ='$by_penerbit'";
        } else if ($by_kota){
            $where = $where . " $operator UPPER(PT.TEMPAT_TERBIT) = '$by_kota'";
        } else {
            $where; //hanya mengambil filter
        }

        //query
        $query = "SELECT *
            FROM (
                SELECT 
                    (prefix_element || '-' || publisher_element || '-' || item_element || '-' || check_digit) AS ISBN_NO,
                    -- PI.ISBN_NO,
                    PT.TITLE,
                    PT.KEPENG,
                    PT.TEMPAT_TERBIT,
                    PT.JML_JILID,
                    PT.TAHUN_TERBIT,
                    PT.SERI,
                    PT.ID,
                    PT.LINK_BUKU,
                    PT.IS_KDT_VALID,
                    P.NAME AS NAMA_PENERBIT,
                    P.ID AS PENERBIT_ID,
                    ROW_NUMBER() OVER (ORDER BY PI.CREATEDATE DESC) AS rnum
                FROM PENERBIT_ISBN PI
                JOIN PENERBIT_TERBITAN PT ON PI.PENERBIT_TERBITAN_ID = PT.ID
                JOIN PENERBIT P ON PI.PENERBIT_ID = P.ID
                $where
                ORDER BY PI.CREATEDATE DESC
            )
            WHERE rnum BETWEEN $start AND $length";

        //fetch api
        $data = kurl('get','getlistraw', null, $query, 'sql');
        $responseData = $data['Data'];


        // Fetch all data for total count
        $totalQuery = "SELECT COUNT(*) as total
            FROM PENERBIT_ISBN PI
            JOIN PENERBIT_TERBITAN PT ON PI.PENERBIT_TERBITAN_ID = PT.ID
            JOIN PENERBIT P ON PI.PENERBIT_ID = P.ID
            $where
        ";

        $totalData = kurl('get', 'getlistraw', null, $totalQuery, 'sql');
        $totalRecords = $totalData['Data']['Items'][0]['TOTAL'];

        //Olah data
        $data = $responseData['Items']; // Data for the current page
        // $totalRecords = count($responseData['Items']); // Total records before pagination
        // $totalFiltered = count($responseData['Items']); // Total records after filtering

        // Return data in DataTables format
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data
        ]);
    }

    function penerbit_terbanyak() {
        $query = "SELECT 
                NAMA_PENERBIT, 
                jumlah
            FROM (
                SELECT 
                    P.NAME AS NAMA_PENERBIT,
                    COUNT(*) AS jumlah
                FROM 
                    penerbit_terbitan PT
                JOIN PENERBIT P ON PT.PENERBIT_ID = P.ID 
                WHERE 
                    PT.PENERBIT_ID IS NOT NULL
                GROUP BY 
                    P.NAME -- Use P.NAME in the GROUP BY instead of PENERBIT_ID
                ORDER BY 
                    jumlah DESC
            ) 
            WHERE ROWNUM <= 5";

        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');
            if ($data['Status'] == "Error") {
                return [];
            } else {
                //response
                return $data['Data']['Items'];
            }
        } catch (Exception $e) {
            return [];
        }
    }

    function kota_penerbit_terbanyak() {
        $query = "SELECT * FROM (
            SELECT 
                PT.TEMPAT_TERBIT as CITY, 
                COUNT(PI.ISBN_NO) AS JUMLAH
            FROM PENERBIT_ISBN PI
            JOIN PENERBIT_TERBITAN PT ON PI.PENERBIT_TERBITAN_ID = PT.ID
            JOIN PENERBIT P ON PI.PENERBIT_ID = P.ID
                WHERE PT.TEMPAT_TERBIT IS NOT NULL
            GROUP BY PT.TEMPAT_TERBIT
            ORDER BY JUMLAH DESC
        ) 
        WHERE ROWNUM <= 5";

        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');

            if ($data['Status'] == "Error") {
                return [];
            } else {
                //response
                return $data['Data']['Items'];
            }
        } catch (Exception $e) {
            return [];
        }
    }

    function dataKdt() {
        $query = "SELECT 
                NAMA_PENERBIT, 
                jumlah
            FROM (
                SELECT 
                    P.NAME AS NAMA_PENERBIT,
                    COUNT(*) AS jumlah
                FROM 
                    penerbit_terbitan PT
                JOIN PENERBIT P ON PT.PENERBIT_ID = P.ID 
                WHERE 
                    PT.PENERBIT_ID IS NOT NULL
                GROUP BY 
                    P.NAME -- Use P.NAME in the GROUP BY instead of PENERBIT_ID
                ORDER BY 
                    jumlah DESC
            ) 
            WHERE ROWNUM <= 5";

        try {
            // API call
            $data = kurl('get', 'getlistraw', null, $query, 'sql');
            if ($data['Status'] == "Error") {
                return [];
            } else {
                //response
                return $data['Data']['Items'];
            }
        } catch (Exception $e) {
            return [];
        }
    }

}
