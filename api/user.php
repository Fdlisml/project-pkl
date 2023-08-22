<?php 
require_once 'sendRequest.php';

$url = "https://klikyuk.com/ngankngonk/fadli/project-pkl/api/user.php/";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $response = sendRequest($url, 'GET');
   $data = json_decode($response, true);

   if ($data === null) {
      echo "Error decoding JSON: " . json_last_error_msg();
   } else {
      $jsonData = json_encode($data);
      $data_user = $data['data_user'];
   }
}else{
   $error = '<script>alert("Incorect Method!");</script>';
   echo $error;
}
?>