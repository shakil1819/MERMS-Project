<?php
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </div>
                    <!-- logo -->
                    <div class="action">
                        <div class="profile" onclick="menuToggle();">
                            <div id="profile-name">
                                <h3>Jon Doe</h3>
                            </div>
                            <img src="./assets/images/avatar.jpg">
                        </div>
                        <div class="menu">
                            <ul>
                                <li>
                                    <img src="./assets/icons/log-out.png"><a href="./index.html">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- menu start -->
                    <nav class="main-menu navbar navbar-expand-md">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="http://localhost/Project/user_home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/Project/user_demand.php">Demand</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/Project/user_repair.php">Repair</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
    }
</script>

</html>