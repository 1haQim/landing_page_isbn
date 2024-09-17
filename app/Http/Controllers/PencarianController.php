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
        if ($filter_by == 'all') {
            $where = "WHERE PI.ISBN_NO LIKE '%".$keyword."%' OR PT.TITLE LIKE '%".$keyword."%' OR PT.KEPENG LIKE '%".$keyword."%' OR P.NAME LIKE '%".$keyword."%'";
        } else if($filter_by) {
            $where = "WHERE $filter_by LIKE '%".$keyword."%'"; //filterby ambil dari params filter dihome
        } else {
            $where = '';
        }
        
        //filter dari halaman pencarian 
        $by_penerbit = $request->input('by_penerbit');
        $by_kota = $request->input('by_kota');
        //validasi 
        if ($by_penerbit && $by_kota) {
            $where = $where . " AND P.NAME ='$by_penerbit' AND PT.TEMPAT_TERBIT = '$by_kota'";
        } else if ($by_penerbit){
            $where = $where . " AND P.NAME ='$by_penerbit'";
        } else if ($by_kota){
            $where = $where . " AND PT.TEMPAT_TERBIT = '$by_kota'";
        } else {
            $where;
        }

        // dd($where);
        //query
        $query = "SELECT *
            FROM (
                SELECT 
                    PI.ISBN_NO,
                    PT.TITLE,
                    PT.KEPENG,
                    PT.TEMPAT_TERBIT,
                    PT.TAHUN_TERBIT,
                    PT.SERI,
                    PT.LINK_BUKU,
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
        $totalQuery = "
            SELECT COUNT(*) as total
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
