<?php
require_once 'config/database.php';

session_start();

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];

if (!isset($user_id)) {
   header('location:login.php');
}

require_once 'laporan.php';
$data_laporan = $data['data_laporan'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
   <!-- ======= Styles ====== -->
   <link rel="stylesheet" href="public/css/hasil.css">
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
                           <img src="public/image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png" alt="">
                        </div>
                     </span>
                     <span class="title">WorkAssigner</span>
                  </div>
               </a>
            </li>

            <li>
               <a href="index.php">
                  <span class="icon">
                     <ion-icon name="reader-outline"></ion-icon>
                  </span>
                  <span class="title">Work</span>
               </a>
            </li>

            <li>
               <a href="#">
                  <span class="icon">
                     <ion-icon name="checkmark-done-outline"></ion-icon>
                  </span>
                  <span class="title">Working Result</span>
               </a>
            </li>

            <li>
               <a href="logout.php">
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
               <div class="card">
                  <div>
                     <div class="say">Good Morning, <?= $name ?></div>
                     <div class="desc">Selamat Mengerjakan Pekerjaannya. Semangat!</div>
                     <div id="txt"></div>
                     <div class="left2">
                        <p id="day"></p>
                        <p id="date"></p>/
                        <p id="month"></p>
                        <p id="year"></p>
                     </div>
                  </div>

                  <div class="imgBx">
                     <img src="public/image/Telecommuting-pana-removebg-preview.png">
                  </div>
               </div>

               <div class="card">
                  <div class="container2">
                     <div class="cloud front">
                        <span class="left-front"></span>
                        <span class="right-front"></span>
                     </div>
                     <span class="sun sunshine"></span>
                     <span class="sun"></span>
                     <div class="cloud back">
                        <span class="left-back"></span>
                        <span class="right-back"></span>
                     </div>
                  </div>

               </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
               <div class="recentOrders">
                  <div class="cardHeader">
                     <h2>Working Result</h2>
                     <a href="index.php" class="btn">Pekerjaan</a>
                  </div>

                  <?php foreach ($data_laporan as $laporan) : ?>
                     <div class="wadah-table">
                        <div class="table-flex">
                           <table>
                              <tbody>
                                 <tr>
                                    <td>Name Laporan</td>
                                    <td><?= $laporan["nama_laporan"] ?></td>
                                 </tr>
                              </tbody>

                              <tbody>
                                 <tr>
                                    <td>Deskripsi</td>
                                    <td><?= $laporan["deskripsi"] ?></td>
                                 </tr>

                                 <tr>
                                    <td>Keluhan</td>
                                    <td><?= $laporan["keluhan"] ?></td>
                                 </tr>

                                 <form action="laporan.php" method="POST">
                                    <tr>
                                       <td>Progres</td>
                                       <td>
                                          <div class="field">
                                             <div class="range-active">
                                                <input class="range" type="range" name="progres" min="0" max="100" value="<?= $laporan["progres"] ?>" steps="1">
                                             </div>
                                             <div class="value">
                                                <span class="rangeValue"><?= $laporan["progres"] ?>%</span>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>

                                    <tr>
                                       <td>Tanggal Laporan</td>
                                       <td><?= $laporan["tgl_laporan"] ?></td>
                                    </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="btn-update">
                           <input type="hidden" name="id_laporan" value="<?= $laporan["id"] ?>">
                           <input type="hidden" name="_method" value="PUT">
                           <button type="submit" class="btn" id="myBtn">Ubah</button>
                        </div>
                        </form>
                     </div>
                  <?php endforeach ?>
               </div>
            </div>
         </div>

         <!-- <button id="myBtn">Open Modal</button> -->

         <!-- The Modal -->
         <!-- <div id="myModal" class="modal">
            Modal content
            <div class="modal-content">
               <div class="modal-header">
                  <span class="close">&times;</span>
                  <h2>Form Update Laporan</h2>
               </div>
               <div class="modal-body">
                  <div class="modal-container">
                     <span class="close">&times;</span>
                     <form class="modal-form" method="post">
                        <span class="modal-title">Form</span>
                        <label for="nama_laporan" class="modal-label">Nama laporan</label>
                        <input type="text" name="nama_laporan" required="" class="modal-input">
                        <label for="deskripsi" class="modal-label">Deskripsi Laporan</label>
                        <textarea name="deskripsi" required="" class="modal-input" cols="5" rows="5"></textarea>
                        <label for="keluhan" class="modal-label">Keluhan</label>
                        <textarea name="keluhan" required="" class="modal-input" cols="5" rows="5"></textarea>
                        <label for="">Progres</label><br>
                        <div class="field">
                           <div class="range-active">
                              <input class="range" type="range" name="progres" min="0" max="100" value="0" steps="1" onmousemove="rangeSlide(this.value)">
                           </div>

                           <div class="value">
                              <span id="rangeValue">0</span>%
                           </div>
                        </div>
                        <button type="submit" class="modal-submit" name="login">Login</button>
                     </form>
                  </div>
               </div>
            </div>
         </div> -->

         <script src="public/js/hasil.js"></script>

         <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
         <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>