<?php

session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['role']) && $_SESSION['role'] !== "admin")) {
   header('Location: ../login.php');
   exit;
}

$id_user = $_SESSION['id_user'];
$name = $_SESSION['name'];

require_once '../api/laporan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
   <!-- ======= Styles ====== -->
   <link rel="stylesheet" href="assets/css/laporan.css">
</head>

<body>
   <!-- =============== Navigation ================ -->
   <div class="container">
      <div class="navigation">
         <ul>
            <li>
               <a href="#">
                  <div class="logo-flex">
                     <span class="icon">
                        <div class="logo-bg">
                           <img src="assets/imgs/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png" alt="">
                        </div>
                     </span>
                     <span class="title">WorkAssigner</span>
                  </div>
               </a>
            </li>

            <li>
               <a href="index.php">
                  <span class="icon">
                     <ion-icon name="document-text-outline"></ion-icon>
                  </span>
                  <span class="title">Project</span>
               </a>
            </li>

            <li>
               <a href="laporan.php">
                  <span class="icon">
                     <ion-icon name="folder-open-outline"></ion-icon>
                  </span>
                  <span class="title">Report</span>
               </a>
            </li>

            <li>
               <a href="tugas.php">
                  <span class="icon">
                     <ion-icon name="reader-outline"></ion-icon>
                  </span>
                  <span class="title">Work</span>
               </a>
            </li>

            <li>
               <a href="../logout.php">
                  <span class="icon">
                     <ion-icon name="log-out-outline"></ion-icon>
                  </span>
                  <span class="title">Sign Out</span>
               </a>
            </li>
         </ul>
      </div>

      <!-- ========================= Main ==================== -->
      <div class="main">
         <div class="secMain">
            <div class="topbar">
               <div class="toggle">
                  <ion-icon name="menu-outline"></ion-icon>
               </div>

               <div class="user">
                  <img src="public/image/customer01.jpg" alt="">
               </div>
            </div>


            <!-- ================ Order Details List ================= -->
            <!-- <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Data Project</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <div class="form">
                        <form action="" method="post">
                            <label for="nama_project">
                                Nama Project <input type="text" name="nama_project">
                            </label>
                            <label for="tugas">
                                tugas <input type="text" name="">
                            </label>
                            <label for="deskripsi">
                                Deskripsi <input type="text" name="deskripsi">
                            </label>
                            <input type="submit" name="submit" value="Kirim !">
                        </form>
                    </div>
                </div> -->

            <!-- ================= New Customers ================ -->
            <div class="recentCustomers">
               <div class="cardHeader">
                  <h2>Data Laporan</h2>
               </div>
               <table>
                  <thead>
                     <tr>
                        <th>NAMA LAPORAN</th>
                        <th>DESKRIPSI</th>
                        <th>TANGGAL LAPORAN</th>
                        <th>ID TUGAS</th>
                        <th>ID USER</th>
                     </tr>
                     <?php foreach ($data_laporan as $laporan) : ?>
                        <div class="wadah-table">
                           <tr>
                              <td><?= $laporan["nama_laporan"] ?></td>
                              <td><?= $laporan["deskripsi"] ?></td>
                              <td><?= $laporan["tgl_laporan"] ?></td>
                              <td><?= $laporan["id_tugas"] ?></td>
                              <td><?= $laporan["id_user"] ?></td>
                           </tr>
                        </div>
                     <?php endforeach ?>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>

   <!-- =========== Scripts =========  -->
   <script src="assets/js/main.js"></script>

   <!-- ====== ionicons ======= -->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>