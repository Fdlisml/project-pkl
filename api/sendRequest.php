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
