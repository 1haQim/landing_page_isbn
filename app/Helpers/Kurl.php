<?php

use Illuminate\Support\Facades\Http;

function kurl($method, $action, $table, $filter) {
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


// function kurl($method, $url, $json, $auth = false) {
//   try {
//       $headers = [
//         'content-type' => 'application/json',
//         'Accept' => 'application/json'
//       ];

//       if ($auth) $headers['Authorization'] = 'Bearer ' . Session::get('token');

//       $client = new Client([
//         'headers' => $headers,
//       ]);

//   //      dd(json_encode($json));

//       $response = $client->request($method, env('APP_API') . '/' . $url, [
//         'json' => $json,
//       ]);

//       $data = json_decode($response->getBody(), true);

//       return $data;

//   } catch (\Exception $e) {
//   //     dd($e->getMessage());
//     $data = (array) json_decode($e->getResponse()->getBody()->getContents());
//     if ($data['code'] === 403) { // token expired
//       Session::flush();
//     } else {
//       return $data;
//     }
//   }
// }

