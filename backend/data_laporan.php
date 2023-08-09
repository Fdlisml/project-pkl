<?php 

require_once "database.php";

$sql = mysqli_query($conn, "SELECT * FROM tb_laporan");

if($sql){
   
   $result = array();
   while ($row = mysqli_fetch_array($sql)){
      array_push($result, array(
         'id' => $row['id'],
         'nama_laporan' => $row['nama_laporan'],
         'deskripsi' => $row['deskripsi'],
         'tgl_laporan' => $row['tgl_laporan'],
         'id_tugas' => $row['id_tugas'],
         'id_user' => $row['id_user']
      ));
   };

   echo json_encode( array('data_laporan' => $result) );
}

?>