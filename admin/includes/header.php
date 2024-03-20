<?php
include '../includes/config.php';

if(!isset($_SESSION["admin_logged_in"])){ 
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Book a Chef</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="../assets/css/bs/bootstrap.min.css">
    <link href="../assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/daterangepicker.css">
    <link rel="stylesheet" href="../assets/css/handle-counter.min.css">
    

    <link rel="stylesheet" href="../assets/css/jquery.customselect.css">

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-inline-flex" href="index.html"><img class="d-inline-block" src="../assets/img/gallery/logo.svg" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">Book a chef</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0 justify-content-end " id="navbarSupportedContent">
            <!-- <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
              <p class="mb-0 fw-bold text-lg-center">Deliver to: <i class="fas fa-map-marker-alt text-warning mx-2"></i><span class="fw-normal">Current Location </span><span>Mirpur 1 Bus Stand, Dhaka</span></p>
            </div> -->
            <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0" >
            <div id="home_menu" class="input-group-icon pe-4" style="cursor:pointer;margin-top:10px;color:orange;font-size:17px">Home</div>
            <div id="events_menu" class="input-group-icon pe-4" style="cursor:pointer;margin-top:10px;color:orange;font-size:17px">Manage Events</div>
            <!-- <div id="profile_menu" class="input-group-icon pe-4" style="cursor:pointer;margin-top:10px;color:orange;font-size:17px">Profile</div> -->

              <!-- <div class="input-group-icon pe-2"><i class="fas fa-search input-box-icon text-primary"></i>
                <input class="form-control border-0 input-box bg-100" type="search" placeholder="Search Food" aria-label="Search" />
              </div> -->

              <?php if(isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] == true)
              { 
                echo '<button class="btn btn-white shadow-warning text-warning" style="margin:0px 5px 0px 5px;" onclick="window.location.href=\'logout.php\';" type="button"> <i class="fas fa-user me-2"></i>Logout</button>';
              }
              ?>
              
                
            </form>
          </div>
        </div>
      </nav>
