<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class PencarianController extends Controller
{
    function index() {
        return view('content.pencarian');
    }

    //serverside
    function search(Request $request) {
        $keyword = $request->input('search'); // Search filter

        $query = "SELECT * FROM isbn_data";
        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $query = "SELECT * FROM isbn_data WHERE TITLE LIKE '".$keyword."' OR ISBN LIKE '".$keyword."' OR CITY LIKE '".$keyword."' OR PUBLISHER LIKE '".$keyword."' OR PUBLISH_YEAR LIKE '".$keyword."'";
        }

        //fetch api
        $data = kurl('get','getlistraw', null, $query, 'sql');
        $responseData = $data['Data'];

        //Olah data
        $data = $responseData['Items']; // Data for the current page
        $totalRecords = count($responseData['Items']); // Total records before pagination
        $totalFiltered = count($responseData['Items']); // Total records after filtering

        // Return data in DataTables format
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalFiltered,
            'data' => $data
        ]);
    }
}
