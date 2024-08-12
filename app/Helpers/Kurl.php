<?php

use Illuminate\Support\Facades\Http;

function kurl($method, $action, $table, $data, $kategori, $id = null) {
    $form_data = [
        'token' => 'WWQG9BP0JBCL3QSAW9K75G',
        'op' => $action,
        'table' => $table,
        $kategori => json_encode($data)
        
    ];
    //jika kondisi ADD
    if ($action == 'add') {
        $form_data += [
            'CreateBy' => 'pendaftaran_online',
            'terminal' => '127.0.0.1'
        ];
    } else if ($action == 'delete') {
        $form_data += [
            'id' => $data,
        ];
    } else if ($action == 'update') {
        $form_data += [
            'id' => $id,
            'UpdateBy' => 'pendaftaran_online',
            'terminal' => '127.0.0.1',
        ];
    }else {}

    // dd($form_data);

    $response = Http::asForm()->$method('http://demo321.online/ISBN_API/Restful.aspx', $form_data);

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