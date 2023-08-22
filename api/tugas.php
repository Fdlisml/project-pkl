<?php
require_once 'sendRequest.php';

$url = "https://klikyuk.com/ngankngonk/fadli/project-pkl/api/tugas.php/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
      $tugasId = $_POST['id_tugas'];
      $urlUpdate = $url . $tugasId;
      $data = array(
         "progres" => $_POST['progres'],
      );
      sendRequest($urlUpdate, 'PUT', $data);
   } elseif (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
      $tugasId = $_POST['id_tugas'];
      $urlDelete = $url . $tugasId;
      sendRequest($urlDelete, 'DELETE');
   } else {
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