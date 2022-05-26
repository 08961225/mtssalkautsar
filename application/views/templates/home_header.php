<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title><?= $title ?></title>

    <link rel="icon" href="<?= base_url('assets/'); ?>vendor/home/img/favicon.png" type="image/png">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>vendor/home/img/favicon.png" type="img/x-icon">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

    <link href="<?= base_url('assets/'); ?>vendor/home/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/home/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/home/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/home/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/home/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/home/css/animate.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/jquery.1.8.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/jquery.isotope.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/wow.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/classie.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/home/js/magnific-popup.js"></script>

    <!-- =======================================================
    Theme Name: Knight
    Theme URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
    ======================================================= -->
    <style>
        #scroll {
            position: fixed;
            right: 10px;
            bottom: 10px;
            cursor: pointer;
            width: 50px;
            height: 50px;
            background-color: #737373;
            text-indent: -9999px;
            display: none;
            -moz-border-radius: 10px;
            border-radius: 10px
        }

        #scroll span {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -12px;
            height: 0;
            width: 0;
            border: 8px solid transparent;
            border-bottom-color: #ffffff;
        }

        #scroll:hover {
            background-color: #404040;
            opacity: 1;
            filter: "alpha(opacity=100)";
            -ms-filter: "alpha(opacity=100)";
        }
    </style>




</head>

<body>
    <header class="header" id="header">
        <!--header-start-->
        <div class="container">
            <figure class="logo animated fadeInDown delay-07s">
                <a href="#"><img src="<?= base_url('assets/'); ?>vendor/home/img/logo.png" alt=""></a>
            </figure>
            <h1 class="animated fadeInDown delay-07s">Welcome To Procurement Web</h1>
            <ul class="we-create animated fadeInUp delay-1s">
                <li>Kimia Farma, a Healthcare Company of Indonesia.
                    <br>"Improving Health for Better Quality of Life"</br></li>
            </ul>
            <a class="link animated fadeInUp delay-1s servicelink" href="#service">Get Started</a>
        </div>
    </header>
    <!--header-end-->

    <nav class="main-nav-outer" id="test">
        <!--main-nav-start-->
        <div class="container">
            <ul class="main-nav">
                <li><a href="#header">Home</a></li>
                <li><a href="#service">Division</a></li>
                <li><a href="#Portfolio">Product</a></li>
                <li class="small-logo"><a href="#header"><img src="<?= base_url('assets/'); ?>vendor/home/img/small-logo.png" alt=""></a></li>
                <li><a href="#client">Team</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">Action&cudarrr;
                    </a>
                    <ul class=" dropdown-menu">
                        <li><a href="javascript:void(0)" onclick="location.href='<?= site_url('home/rfi'); ?>'" class=" pull-left">RFI</a></li>
                        <li><a href="javascript:void(0)" onclick="location.href='<?= site_url('auth'); ?>'" class="pull-left">Login</a></li>
                        <li><a href="https://eproc.kimiafarma.co.id/ProMISE-KimiaFarma/portal.promise" class="pull-left">e-Proc</a></li>
                    </ul>
                </li>
            </ul>
            <a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
        </div>
    </nav>
    <!--main-nav-end-->