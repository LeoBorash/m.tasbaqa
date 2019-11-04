<?php session_start();

include 'includes/db.php';
require_once 'form/phpmailer/PHPMailerAutoload.php';?>
<!doctype html>

<html lang="ru">
    <?php include 'includes/head.php';?>
<!--==================================================================================================================================-->
<body>
<div class="main-block">
<!--    TOP HEADER START-->
    <?php include 'includes/header.php';?>
<!--==================================================================================================================================-->
<!--=============TOP BANNER START=============-->
    <? include 'functions/banner-index.php'?>
    <!--==================================================================================================================================-->
<!--=============MID CATALOG START=============-->
    <div class="catalog">
        <a href="category" class="btn-catalog btn" style="background: #00a046;color: #ffffff; font-size: 23px;">Каталогәә товаров</a>
    <?php
        if(isset($_SESSION['user_id']) or isset($_SESSION['partner_id'])){
            echo '        
        <a href="profile" style="width: 95%;margin: 5px 10px;" class="btn btn-warning"><i class="fa fa-home mr-1"></i>Личный кабинет</a>
            ';
        }else{
            echo '
            <div class="sign">
               <p>Продавайте свои товары вместе с нами</p>
               <a href="" class="auth-catalog btn btn-info" style="background: #3e77aa;" data-toggle="modal" data-target="#myModal">Войти в кабинет</a>
               <br>
               <a href="#" style="font-size: 16px;color: rgb(62, 119, 170);" data-toggle="modal" data-target="#myModalReg">Регистрация</a>
            </div>
            ';
        }
    ?>
</div>
<!--==================================================================================================================================-->
    <? include 'functions/register-p.php'?>
<!--==================================================================================================================================-->
    <? include 'functions/register-u.php'?>
<!--==================================================================================================================================-->
    <? include 'functions/auth-p.php'?>
<!--==================================================================================================================================-->
    <? include 'functions/auth-u.php'?>
<!--==================================================================================================================================-->
    <? include 'functions/new-products.php'?>
<!--==================================================================================================================================-->
    <? include 'functions/product-popular.php'?>
    <!--==================================================================================================================================-->

</div>
</body>
</html>