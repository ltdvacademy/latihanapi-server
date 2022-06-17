<?php
require 'koneksi.php';
session_start();
 
// check apakah session email sudah ada atau belum.
// jika belum maka akan diredirect ke halaman index (login)
if( empty($_SESSION['uname']) ){
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" style="background-color:#212529">LATIHAN API - WEB
        COEDOTZ</a>

    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

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
                        <a class="nav-link" href="index.php">
                            <span data-feather="file"></span> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="color:#4DAD6B">
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

        <!-- Data -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"> Data API </h1>
                <div class="btn-toolbar mb-2 mb-md-0">
        
                    
                </div>
            </div>

            <!-- Content -->

            <!-- API-->
            <section id='api' class="s-api"></section>

            <div class="b-example-divider"></div>

            <div class="px-4 py-5 my-5 text-center">
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Kamu dapat mengimplementasikan Data
                        kedalam proyek maupun aplikasi kamu.
                    </p>
                </div>

                <div class="container">
                    <div class="row mb-3">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <!-- api artikel -->

                            <p class="text-start">API Data</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control"
                                    value="http://localhost/latihanapi-server/data-api.php"
                                    id="myInputArtikel" readonly="readonly">
                                <button class="btn btn-outline-success" type="button"
                                    onclick="myApiArtikel()">Salin</button>
                            </div>

                            <!-- function untuk copy text -->
                            <script>
                                function myApiArtikel() {
                                    /* Get the text field */
                                    var copyText = document.getElementById("myInputArtikel");

                                    /* Select the text field */
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                    /* Copy the text inside the text field */
                                    document.execCommand("copy");

                                    /* Alert the copied text */
                                    alert("API Berhasil disalin");
                                }
                            </script>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End API -->

            <!-- Content -->

    </div>
    </main>
</div>
</div>

<!-- Data Artikel -->


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js "
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf "
    crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>