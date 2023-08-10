<?php
include 'config/database.php';

session_start();

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];

if (!isset($user_id)) {
   header('location:login.php');
}
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
                        <span class="icon">
                            <div class="logo-bg">
                                <img src="public/image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png" alt="">
                            </div>
                        </span>
                        <span class="title">WorkAssigner</span>
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
                            <h2>Jobs Today</h2>
                            <a href="#" class="btn">History Kerja</a>
                        </div>

                        <table>
                            <?php foreach ($data_project as $project) : ?>
                                <tbody>
                                    <tr>
                                        <td>Name Project</td>
                                        <td><?= $project["nama_project"] ?></td>
                                    </tr>
                                </tbody>

                                <tbody>
                                    <tr>
                                        <td>tugas</td>
                                        <td><?= $project["tugas"] ?></td>
                                    </tr>

                                    <tr>
                                        <td>deskripsi</td>
                                        <td><?= $project["deskripsi"] ?></td>
                                    </tr>
                                </tbody>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="public/js/script.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>