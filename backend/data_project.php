<?php 

require_once "database.php";

$sql = mysqli_query($conn, "SELECT * FROM tb_project");

if($sql){
   
   $result = array();
   while ($row = mysqli_fetch_array($sql)){
      array_push($result, array(
         'id' => $row['id'],
         'nama_project' => $row['nama_project'],
         'tugas' => $row['tugas'],
         'deskripsi' => $row['deskripsi'],
         'tgl_mulai' => $row['tgl_mulai'],
         'tgl_selesai' => $row['tgl_selesai']
      ));
   };

   echo json_encode( array('data_project' => $result) );
}

?>