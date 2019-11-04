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
    <div class="new-products products">
        <h4>Новое поступление</h4>
        <?php
        $query = $conn->query("
      SELECT tovary.*, cat2.cat_title,cat2.cat_id
      FROM tovary 
      INNER JOIN cat2
      ON tovary.category = cat2.tovar_id  ORDER BY data DESC LIMIT 20");
        while ($row = mysqli_fetch_assoc($query)):
            $img = explode('|',$row['img']);?>
            <a href="single-product?id=<?=$row['cat_id']?>">
                <div class="tovar">
                    <div class="block-tovar">
                        <h6><?=$row['cat_title']?></h6>
                        <img src="img/woman/<?=$img[0]?>" alt="">
                        <p><?=$row['title']?></p>
                        <p><?=$row['price']?> ₸</p>
                    </div>
                </div>
            </a>
        <?php endwhile;
        ?>
        <div class="clear"></div>
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

</div>
</body>
</html>