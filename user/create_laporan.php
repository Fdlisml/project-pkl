<?php

$ch = curl_init(); // Inisialisasi session cURL

$url = "https://klikyuk.com/ngankngonk/fadli/project-pkl/api.php";

$data = array(
   "data_laporan" => array(
      "id" => "1",
      "nama_laporan" => "Menyelesaikan tugas membuat navbar",
      "deskripsi" => "Berhasil membuat navbar pada aplikasi Lulu",
      "keluhan" => "Punya temen lelet dalam ngerjain frontend",
      "progres" => "70",
      "tgl_laporan" => "2023-08-08",
      "id_tugas" => "1",
      "id_user" => "1"
   )
);

$jsonData = json_encode($data);

$headers = array(
   'Content-Type: application/json',
   'Content-Length: ' . strlen($jsonData)
);

curl_setopt($ch, CURLOPT_URL, $url); // URL yang akan diakses
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch); // Eksekusi permintaan cURL dan simpan respons

if ($response === false) {
   echo "Error: " . curl_error($ch);
} else {
   echo "POST Response: " . $response;
}

curl_close($ch); // Tutup session cURL

?>