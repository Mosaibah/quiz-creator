<?php
session_start();

include __DIR__.'/../config/app.php';
include __DIR__.'/../config/database.php';
?>

<!DOCTYPE html>
<html lang="ar">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Art Factory HTML CSS Template</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="http://localhost/My_app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/My_app/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/My_app/assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/My_app/assets/css/owl-carousel.css">
    <!-- oragin bootstrab from flex -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="http://localhost/My_app/home" class="logo">تحداني</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="http://localhost/My_app/#welcome" class="active">الرئيسية</a></li>
                            <li class="scroll-to-section"><a href="http://localhost/My_app/#about">كيف ؟</a></li>
                            <li class="scroll-to-section"><a href="http://localhost/My_app/#services">تحديات</a></li>
                            <li class="scroll-to-section"><a href="http://localhost/My_app/#contact-us">تواصل معنا</a></li>
                            <?php if(!isset($_SESSION['logged_in'])){ ?>
                            <li class="scroll-to-section"><a href="login.php">سجل دخول</a></li>
                            <li class="scroll-to-section"><a href="register.php">حساب جديد</a></li>
                          <?php }else {?>
                            <li class="scroll-to-section"><a href="logout.php">سجل خروج</a></li>
                          <?php } ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>

                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
