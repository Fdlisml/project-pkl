<?php
require_once 'sendRequest.php';

$url = "https://klikyuk.com/ngankngonk/fadli/project-pkl/api/laporan.php/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
      $laporanId = $_POST['id_laporan'];
      $urlUpdate = $url . $laporanId;
      $data = array(
         "progres" => $_POST['progres'],
      );
      sendRequest($urlUpdate, 'PUT', $data);
   }elseif (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
      $laporanId = $_POST['id_laporan'];
      $urlDelete = $url . $laporanId;
      sendRequest($urlDelete, 'DELETE');
   }else {
      $data = array(
         "nama_laporan" => $_POST['nama_laporan'],
         "deskripsi" => $_POST['deskripsi'],
         "keluhan" => $_POST['keluhan'],
         "progres" => $_POST['progres'],
         "tgl_laporan" => date("Y-m-d"),
         "id_tugas" => $_POST['id_tugas'],
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
      $data_laporan = $data['data_laporan'];
   }
}