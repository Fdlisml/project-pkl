<?php

function sendRequest($url, $method, $data = null)
{
   $ch = curl_init();
   $headers = array(
      'Content-Type: application/json'
   );

   $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_HTTPHEADER => $headers
   );

   if ($method === 'POST' || $method === 'PUT') {
      $jsonData = json_encode($data);
      $options[CURLOPT_POSTFIELDS] = $jsonData;
      $headers[] = 'Content-Length: ' . strlen($jsonData);
   }

   curl_setopt_array($ch, $options);

   $response = curl_exec($ch);

   if ($response === false) {
      echo "Error: " . curl_error($ch);
   }else{
      if($method !== 'GET'){
         echo $response;
      }else{
         // echo json_encode(["message" => "Laporan founded"]);
      }
   }

   curl_close($ch);
   return $response;
}

$url = "https://klikyuk.com/ngankngonk/fadli/project-pkl/api/tugas.php/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
      $tugasId = $_POST['id_tugas'];
      $urlUpdate = $url . $tugasId;
      $data = array(
         "progres" => $_POST['progres'],
      );
      sendRequest($urlUpdate, 'PUT', $data);
   }elseif (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
      $tugasId = $_POST['id_tugas'];
      $urlDelete = $url . $tugasId;
      sendRequest($urlDelete, 'DELETE');
   }else {
      $data = array(
         "nama_tugas" => $_POST['nama_tugas'],
         "deskripsi" => $_POST['deskripsi'],
         "tgl_mulai" => $_POST['tgl_mulai'],
         "tgl_selesai" => $_POST['tgl_selesai'],
         "id_project" => $_POST['id_project'],
         "id_user" => $_POST['id_user']
      );
      sendRequest($url, 'POST', $data);
   }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $response = sendRequest($url, 'GET');
   $data = json_decode($response, true);

   if ($data === null) {
      echo "Error decoding JSON: " . json_last_error_msg();
   } else {
      $jsonData = json_encode($data);
      $data_tugas = $data['data_tugas'];
   }
}