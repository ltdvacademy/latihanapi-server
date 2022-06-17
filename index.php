<?php

// membutuhkan pemanggilan akses koneksi (mysql)
require 'koneksi.php';

// menjalankan sessions
session_start();

// check apakah session email sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if (empty($_SESSION['uname'])) {
    header('Location: login.html');
}

?>

<!doctype html>
<html lang="en">

<head>

    <!-- Meta Tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta Tags -->

    <!-- Bootstrap core CSS -->

    <title>Latihan API - Server</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="dashboard.css" rel="stylesheet">

    <!-- Style -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .nav-item img {
            padding-left: 20%;
        }

        .nav-item p {
            text-align: center;
            text-decoration: dotted;
        }

        .table-responsive h2 {
            text-align: center;
        }
    </style>

    <!-- Style -->

</head>

<!-- Nav -->

<header class="navbar navbar-dark sticky-top bg-dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" style="background-color:#212529">LATIHAN API - WEB COEDOTZ</a>

    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

<!-- Nav -->

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

            <div>
                <br>
                <ul class="nav flex-column mb-2">
                    <li class="nav justify-content-center">
                        <img src="img/coedotz.jpeg" alt="" height="180px">
                    </li>
                    <br>
                    <li class="nav-item">
                        <p><strong>NAMA KALIAN</strong></p>
                    </li>
                    <li class="nav-item">
                        <p>NIM KALIAN</p>
                    </li>
                    </li>
                </ul>
            </div>

            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="color:#4DAD6B">
                            <span data-feather="file"></span> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="halamanapi.php">
                            <!-- API -->
                            <span data-feather="settings"></span> API
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signout.php">
                            <span data-feather="log-out"></span> Sign Out
                        </a>
                    </li>
                    </li>
                </ul>

            </div>
        </nav>

        <!-- Nav -->

        <!-- Sub Header -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"> Home </h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                        <!-- Form Cari data -->
                        <form class="d-flex" method="post" enctype="multipart/form-data">
                            <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Judul" aria-label="Search" required>
                            <button class="btn btn-outline-success" name="cari" type="submit">Cari</button>
                        </form>
                    </div>
                    <div class="btn-group me-2">

                        <!-- Tombol Tambah data -->
                        <button type="button" onclick="tambahdata()" class="btn btn-sm btn-outline-secondary">
                            <span data-feather="file"></span>
                            Tambah Data
                        </button>

                        <!-- Tombol Refresh data -->
                        <button type="button" onclick="refresh()" class="btn btn-sm btn-outline-secondary">
                            <span data-feather="refresh-ccw"></span>
                        </button>
                    </div>

                    <!-- Membuat func untuk tambah data -->
                    <script>
                        function tambahdata() {
                            location.href = "form-tambahdata.php";
                        }
                    </script>

                    <!-- Membuat func untuk refresh data -->
                    <script>
                        function refresh() {
                            location.href = "index.php";
                        }
                    </script>
                </div>
            </div>

            <!-- Sub Header -->

            <!-- Content -->

            <div class="table-responsive">

            <!-- Membuat table untuk menampilkan data -->
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="visibility: hidden;">ID</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        // urutan no akan terus bertambah dari 1
                        $no = 1;

                        // melakukan pengecekan utnuk mencari data
                        if (isset($_POST["cari"])) {
                            $search = mysqli_real_escape_string($db, $_POST['keyword']);
                            $query = mysqli_query($db, "SELECT * FROM dataku WHERE judul LIKE '%$search%' ORDER BY judul ASC");

                            // jika data tidak dicari akan menampilkan seluruh data berdasarkan ascending
                        } else {
                            $query = mysqli_query($db, "SELECT * FROM dataku ORDER BY judul ASC");
                        }

                        // melakuakan perulangan untuk mengambil seluruh data row pada kolom
                        while ($row = mysqli_fetch_assoc($query)) {

                            // gambar
                            $img = "http://localhost/latihanapi-server/img/" . $row['gambar']; // LOCAL
                            // HOSTING $img = "https://localhost/latihanapi-server/img/".$row['url_gambar'];
                        ?>
                        <!-- isi dari row yang dipanggil berdasarkan kolomnya -->
                            <tr>
                                <td style="visibility: hidden;"><?php echo $row['id']; ?></td>
                                <td> <img src='<?php echo $img ?>' height="50px" width="70px" /></td>
                                <td><?php echo $row['judul']; ?></td>
                                <td><?php echo $row['deskripsi']; ?></td>

                                <!-- isi action -->
                                <td>
                                    <!-- tombol update data -->
                                    <a href="form-updatedata.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-flat btn-sm"> <span data-feather="edit"></span> Edit</a>

                                    <!-- tombol hapusdata -->
                                    <a href="hapusdata.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-flat btn-sm"> <span data-feather="trash"></span> Delete</a>
                                <?php
                            }
                                ?>
                    </tbody>
                </table>

                <!-- Content -->

            </div>
        </main>
    </div>
</div>

<!-- Data -->


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js " integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf " crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>