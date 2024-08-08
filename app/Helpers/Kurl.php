<?php

use Illuminate\Support\Facades\Http;

function kurl($method, $action, $table, $req_filter) {
    $filter = json_encode($req_filter);
    $response = Http::$method('http://demo321.online/ISBN_API/Restful.aspx', [
        'token' => 'WWQG9BP0JBCL3QSAW9K75G',
        'op' => $action,
        'table' => $table,
        'KriteriaFilter' => $filter
    ]);

    if ($response->successful()) {
        $data = $response->json();
        return $data;

    } else {
        // Handle the error
        $status = $response->status();
        $error = $response->body();
        return $status;
    }
}