<?php session_start() ?>
<!DOCTYPE html>
<html>
<?php include 'includes/db.php';?>
<?php include 'includes/head.php';?>
<body>
<div class="main-block ">
<!--==================================================================================================================================-->
    <?php include 'includes/header.php';?>
<!--==================================================================================================================================-->
<div class="single-product">
    <?php
    $query = $conn->query("
    SELECT * FROM tovary 
    WHERE id=$_GET[id]");
    while ($row = mysqli_fetch_assoc($query)){
        $images = explode('|', $row['img']); ?>
        <div class="block-k">
            <a href="/" style="font-size: 14px; margin-left: 5px"><i class="fa fa-arrow-alt-circle-left"></i> Назад</a>
            <span style="font-size: 17px;"><?=$row['title']?></span>
        </div>
        <div class="container">
            <?php foreach ($images as $img): ?>
                <div class="mySlides">
                    <img src="img/woman/<?php echo $img; ?>" style="width:100%; height: 350px">
                </div>
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
            <?php endforeach; ?>
        </div>
        <span class="float-left"><?php if($row['instock']==1){echo 'Есть в наличии';} else{echo 'Нет в наличии';}?></span>
        <span class="float-right" data-toggle="modal" data-target="#myModalPartner" style="cursor: pointer">Продавец <i class="fas fa-exclamation-circle"></i></span>
            <div class="div" style="clear: both">
                <p class="ml-3">Цена: <?=$row['price']?> ₸</p>
            </div>
            <div class="div">
                <button class="btn btn-success ml-3 float-left" style="width: 44%;" id="cart"><i class="fas fa-cart-arrow-down "></i> Купить</button>
                <button class="btn btn-warning mr-3 float-right" style="width: 43%;margin-bottom: 10px;" id="like"><i class="far fa-heart "></i> Нравится</button>
                <p class="m-3 form-control-sm clear"><?=$row['mini_text']?></p>
                <p id="text" style="display: none"><?=$row['id']?></p>
                <div id="countcart"></div>
            </div>
    <?php }
    ?>
</div>

    <div id="myModalPartner" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php
                        $query = $conn->query("
                            SELECT * FROM tovary
                            WHERE tovary.id = $_GET[id]");
                            while ($row = mysqli_fetch_assoc($query)){
                                $partner_id = $row['partner_id'];
                            }
                            $query = $conn->query("
                            SELECT * FROM partner
                            WHERE partner_id= $partner_id");
                            while ($row = mysqli_fetch_assoc($query)){ ?>
                                <table cellspacing="0">
                                    <tr>
                                        <td style="font-size: 13px; font-weight: bold;">Продавец: </td><td style="font-size: 16px; padding-left: 20px;"><?=$row['fname']?> <?=$row['sname']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 13px; font-weight: bold;">Город: </td><td style="font-size: 16px; padding-left: 20px;"><?=$row['city']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 13px; font-weight: bold;">Рынок: </td><td style="font-size: 16px; padding-left: 20px;"><?=$row['market']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 13px; font-weight: bold;">Ряд: </td><td style="font-size: 16px; padding-left: 20px;"><?=$row['row']?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 13px; font-weight: bold;">Место: </td><td style="font-size: 16px; padding-left: 20px;"><?=$row['place']?></td>
                                    </tr>
                                </table>
                            <?php }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <div id="res"></div>
    <script>
        $("#cart").click(function () {
            var str = $("#text").text();
            $.ajax({
                method: "POST",
                url: "cart",
                dataType: "text",
                data: {text: str},
                success: function(data)
                {
                    $("#countcart").html(data);
                }});
        });
    </script>


    <!--==================================================================================================================================-->
    <? include 'functions/auth-p.php'?>
    <!--==================================================================================================================================-->
    <? include 'functions/auth-u.php'?>
<script src="js/slider-product.js"></script>
</div>
</body>
</html>
