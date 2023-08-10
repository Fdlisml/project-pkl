<?php 

require_once "database.php";

$nama_project = $_POST['nama_project'];
$tugas = $_POST['tugas'];
$deskripsi = $_POST['deskripsi'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];

$sql = mysqli_query($conn, "INSERT INTO tb_project(nama_project,tugas,deskripsi,tgl_mulai,tgl_selesai) VALUES('$nama_project','$tugas','$deskripsi','$tgl_mulai','$tgl_selesai')");

if($sql){
   echo json_encode(array('message' => 'Project berhasil dibuat!'));
}else{
   echo json_encode(array('message' => 'Project gagal dibuat!'));
}

?>