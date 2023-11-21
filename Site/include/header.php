<?php
$role = null;

if (isset($_SESSION['username'])) {
    $userrole_id = new User();
    $role = $userrole_id->userrole($_SESSION['username'], $_SESSION['passwords']);
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->

    <title>NLP Shop</title>
    <!--
        CSS
        ============================================= -->

    <!-- bootraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="./Site/css/linearicons.css">
    <link rel="stylesheet" href="./Site/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Site/css/themify-icons.css">
    <link rel="stylesheet" href="./Site/css/bootstrap.css">
    <link rel="stylesheet" href="./Site/css/owl.carousel.css">
    <link rel="stylesheet" href="./Site/css/nice-select.css">
    <link rel="stylesheet" href="./Site/css/nouislider.min.css">
    <link rel="stylesheet" href="./Site/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="./Site/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="./Site/css/magnific-popup.css">
    <link rel="stylesheet" href="./Site/css/main.css">
    <link rel="stylesheet" href="./Site/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <?php session_start(); ?>
    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="./Public/img/logo/logo.png" style="width:70px;height:60px" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="./index.php?pages=site&action=home&layout=home">Trang chủ</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="index.php?pages=site&action=home&layout=category" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="./index.php?pages=site&action=home&layout=category">Áo thun</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-product.html">Quần short</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Quần thun dài</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cart.html">Quần jean</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="index.php?pages=site&action=home&layout=contact">Liên hệ</a></li>
                            <?php if (!isset($_SESSION['user_on'])) { ?>
                                <li class="nav-item"><a class="nav-link" href="index.php?pages=site&action=home&layout=login">Đăng nhập</a></li>
                            <?php } else {
                                $userlist = new User();
                                $Info = $userlist->selletusername($_SESSION['username'], $_SESSION['passwords']);

                                if ($role['role_id'] == 1) {

                                    echo '<img class="rounded-circle m-2" 
                            width="32" height="32" src="./Public/img/logo/avatar.jpg" alt="">
                                 <li class="nav-item submenu dropdown"><a href="index.php?pages=site&action=home&layout=category" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $_SESSION['username'] . ' </a>
                                     <ul class="dropdown-menu ">                   
                                    <li class="nav-item"><a class="nav-link" href="/index.php?pages=logout">Đăng xuất</a></li>
                                    <li class="nav-item"><a class="nav-link" href=" /index.php?pages=admin&layout=home&modulde=dashboard&action=list">Quản lý tài khoản</a></li>                                 
                                    </ul></li>';
                                } else {
                                    echo '<img class="rounded-circle m-2" 
                            width="32" height="32" src="./Public/img/logo/avatar.jpg" alt="">
                                 <li class="nav-item submenu dropdown"><a href="index.php?pages=site&action=home&layout=category" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $_SESSION['username'] . ' </a>
                                     <ul class="dropdown-menu ">                   
                                    <li class="nav-item"><a class="nav-link" href="/index.php?pages=logout">Đăng xuất</a></li>
                                    <li class="nav-item"><a class="nav-link" href=" index.php?pages=site&action=home&layout=infouser">Quản lý tài khoản</a></li>                                 
                                    </ul></li>';
                                }
                            }

                            ?>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="./index.php?pages=site&action=home&layout=cart" class="cart"><span class="ti-bag"></span></a></li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->