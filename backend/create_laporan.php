<?php 

require_once "database.php";

$nama_laporan = $_POST['nama_laporan'];
$deskripsi = $_POST['deskripsi'];
$tgl_laporan = date("Y-m-d");
$id_tugas = $_POST['id_tugas'];
$id_user = $_POST['id_user'];

$sql = mysqli_query($conn, "INSERT INTO tb_laporan(nama_laporan,deskripsi,tgl_laporan,id_tugas,id_user) VALUES('$nama_laporan','$deskripsi','$tgl_laporan','$id_tugas','$id_user')");

if($sql){
   echo json_encode(array('message' => 'Laporan berhasil dibuat!'));
}else{
   echo json_encode(array('message' => 'Laporan gagal dibuat!'));
}

?>