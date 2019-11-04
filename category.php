<?php session_start(); ?>
<!doctype html>
<html lang="ru">
    <?php include 'includes/head.php';?>
    <?php include 'includes/db.php';?>
<body>
<div class="main-block">

    <?php include 'includes/header.php';?>
    <?php
    if(!isset($_GET['id'])){
        $query = $conn->query("SELECT * FROM cat");
        ?>
        <div class="block-k">
            <a href="/" style="font-size: 14px; margin-left: 5px"><i class="fa fa-arrow-alt-circle-left"></i> Назад</a>
            <span class="m-3">Каталог товаров</span>
        </div>
        <?php
        while ($row = mysqli_fetch_assoc($query)){ ?>
            <ul>
                <li style="font-size: 13px;list-style: none">
                    <a href="?id=<?=$row['id']?>"><img class="mr-2" src="img/category/<?=$row['img']?>" width="50px"><?= $row['title']?></a>
                </li>
            </ul>
        <?php }
        }else{ ?>
        <div class="popular-products">
            <?php
            if (isset($_GET['id'])){
              $query = $conn->query("
              SELECT * FROM cat WHERE id = $_GET[id]");
              while ($row = mysqli_fetch_assoc($query)){ ?>
                  <h5 class="m-3"><?=$row['title']?></h5>
              <?php }
            }
            $query = $conn->query("
              SELECT tovary.*, cat2.cat_title,cat2.cat_id
              FROM tovary 
              INNER JOIN cat2
              ON tovary.category = cat2.tovar_id  
              WHERE category = $_GET[id]
              ORDER BY data DESC LIMIT 6");
            while ($row = mysqli_fetch_assoc($query)):
                $img = explode('|',$row['img']);?>
                 <a href="single-product?id=<?=$row['id']?>">
                    <div class="tovar">
                        <div class="block-tovar">
                            <img src="img/woman/<?=$img[0]?>">
                            <p><?=$row['title']?></p>
                            <p><?=$row['price']?> ₸</p>
                        </div>
                    </div>
                </a>
            <?php endwhile;
            ?>
        </div>
        <?php
        }
    ?>
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
    <div class="row mb-3 clear">
        <a href="feedback" style="background: #f5f5f5;font-size: 17px; margin: 0 auto;">Связаться с нами</a>
    </div>
</body>
</html>
