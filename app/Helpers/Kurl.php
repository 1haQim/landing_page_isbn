<?php

use Illuminate\Support\Facades\Http;

function kurl($method, $action, $table, $data, $kategori) {
    $response = Http::asForm()->$method('http://demo321.online/ISBN_API/Restful.aspx', [
        'token' => 'WWQG9BP0JBCL3QSAW9K75G',
        'op' => $action,
        'table' => $table,
        $kategori => json_encode($data) // Mengirimkan array sebagai JSON string
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

function kurl_upload($method, $action, $penerbit_id, $file, $ip_user) {
    $response = Http::asMultipart()->$method('http://demo321.online/ISBN_API/Restful.aspx', [
        [
            'name'     => 'token',
            'contents' => 'WWQG9BP0JBCL3QSAW9K75G',
        ],
        [
            'name'     => 'op',
            'contents' => $action,
        ],
        [
            'name'     => 'penerbitid',
            'contents' => $penerbit_id,
        ],
        [
            'name'     => 'actionby',
            'contents' => $penerbit_id,
        ],
        [
            'name'     => 'terminal',
            'contents' => $ip_user,
        ],
        [
            'name'     => 'file',
            'contents' => fopen($file->getRealPath(), 'r'),
            'filename' => $file->getClientOriginalName(),
        ],
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