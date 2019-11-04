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
    <div class="popular-products">
        <div class="block-k">
            <a href="/" style="font-size: 14px; margin-left: 5px"><i class="fa fa-arrow-alt-circle-left"></i> Назад</a>
            <span>Ваши запросы:</span>
        </div>
        <?php
        $search = $_POST['search'];
        $query = $conn->query("
      SELECT tovary.*, cat2.cat_title,cat2.cat_id
      FROM tovary 
      INNER JOIN cat2
      ON tovary.category = cat2.tovar_id 
      WHERE title LIKE '%$search%' or cat_title LIKE '%$search%'
      ORDER BY data DESC LIMIT 6");
        while ($row = mysqli_fetch_assoc($query)):
            $img = explode('|',$row['img']);?>
            <a href="single-product?id=<?=$row['id']?>">
                <div class="tovar">
                    <div class="block-tovar1">
                        <img src="img/woman/<?=$img[0]?>" alt="">
                        <p><?=$row['title']?></p>
                        <p><?=$row['price']?> ₸</p>
                    </div>
                </div>
            </a>
        <?php endwhile;
        ?>
    </div>
</div>
</body>
</html>