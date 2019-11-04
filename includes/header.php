<div class="top-header">
    <div id="mySidenav" class="sidenav">
        <div class="logotip">
            <h4 class="sidebar-logo"> <a href="">Tasbaqa</a> Market</h4>
            <?php
                if (isset($_SESSION['user_id']) or isset($_SESSION['partner_id'] )){
                    echo '
                    <a href="profile" style="color: #ffe8a1;"> 
                      <i class="fa fa-user-circle" style="margin: 0 7px 0 -20px;"></i> '.$_SESSION[fname].' '.$_SESSION['sname'].'
                    </a>
                    ';
                }else{
                    echo '
                    <div class="sidebar-auth">
                        <a href="" style="float: left;" data-toggle="modal" data-target="#myModalHauth" onclick="closeNav()">Вход  |</a>
                        <a href="" style="margin-left: -2px;" data-toggle="modal" data-target="#myModalHreg" onclick="closeNav()">Регистрация</a>
                    </div>
                          ';

                }
            ?>

        </div>
        <div class="promokod">
            <a href="">Активируйте промокод <span> ></span></a>
        </div>
<!--==================================================================================================================================-->
        <div class="sidebar-li">
            <a href="#" class="closebtn" onclick="closeNav()" style="color: #ffffff;">&times;</a>
            <a href="/"><i class="fa fa-fw fa-home"></i> Главная</a>
            <a href="category"><i class="fas fa-tags"></i> Каталог товаров</a>
            <a href="#"><i class="fas fa-cart-arrow-down"></i> Корзина</a>
            <a href="#"><i class="fas fa-heart"></i> Списки желаний</a>
            <a href="#"><i class="fas fa-list-alt"></i> Мои заказы</a>
            <a href="#"><i class="fas fa-info"></i> Как сделать заказ</a>
            <a href="#"><i class="fas fa-truck"></i> Условия доставки</a>
            <a href="#"><i class="fas fa-comments-dollar"></i> Условия оплаты</a>
            <a href="#"><i class="fas fa-landmark"></i> Политика конфиденциальности</a>
            <a href="#"><i class="fas fa-hands-helping"></i> Пользовательское соглашение</a>
            <a href="#"><i class="fas fa-star"></i> О нас</a>
            <a href="#"><i class="fas fa-phone-volume"></i> Обратная связь</a>
        </div>
    </div>
    <div class="navba">
        <span onclick="openNav()"><i class="fas fa-bars"></i> </span>
    </div>
<!--==================================================================================================================================-->

    <div class="forma">
        <form action="../find" method="post">
            <input type="text" placeholder="Я ищу.." name="search">
            <button type="submit" name="goFind"><i class="fa fa-search"></i></button>
        </form>
    </div>
<!--==================================================================================================================================-->

    <div id="mySidecart" class="sidecart">
        <a href="#" class="closebtncart" onclick="closeCart()">&times;</a>
        <div class="myCart">
            <?php
                if(isset($_SESSION['user_id']) or isset($_SESSION['partner_id'])){
                    $query = $conn->query("
                    SELECT * FROM cart 
                    INNER JOIN tovary
                    ON cart.tovar_id = tovary.id 
                    where user_id='$_SESSION[user_id]' 
                       or '$_SESSION[partner_id]'");
                    while ($row = mysqli_fetch_assoc($query)){
                        $img = explode('|',$row['img']);
                        ?>
                        <div class="in-cart">
                            <a href="gooog">
                                <img src="/img/woman/<?=$img[0]?>" width="40px" style="float: left; margin-left: 20px; clear: both; padding-bottom: 10px;">
                                <p style=""><?=$row['title']?></p>
                            </a>
                        </div>
                    <?php }
                }else {
                    echo '<h5>Корзина пуста</h5>
                <p>Но это никогда не поздно исправить :)</p> ';
                }
            ?>
        </div>
    </div>
    <div class="korzina">
        <?php
        if(isset($_SESSION['user_id']) or isset($_SESSION['partner_id'])) {
            $query = $conn->query("SELECT COUNT(id) as total FROM cart");
            $count = mysqli_fetch_assoc($query); ?>
            <?php
            if($count['total']>0){
                echo  '<p id="countcart" class="countcart">'.$count[total].'</p>';
            }else{
                echo  '<p id="countcart" class="countcart">'.$count[total].'</p>';
            }
        }
        ?>

        <?php ?>
        <span onclick="openCart()"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 23px;"></i> </span>
    </div>
</div>