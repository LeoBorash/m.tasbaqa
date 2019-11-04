<?php session_start();
include 'includes/db.php';?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/head.php'; ?>
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/all.min.js"></script>
    <style>
        .tabcontent2 input,select{
            width: 90%;
            margin: 0 auto;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>
<h4 class="text-center" style="background: #ffc107; padding-bottom: 5px">Личный кабинет</h4>

    <div  class="tabcontent2">
        <?php
        $name=[];
        if(isset($_POST['addproduct']))  {
            $leng = count($_FILES['image']['name']);
            for ($i=0; $i<$leng ; $i++) {
                $exp = explode('.',$_FILES['image']['name'][$i]);
                $rest = $exp[0];
                $rest = $rest[0].$rest[1].$rest[2].mt_rand(5, 15000);;
                $exp = end($exp);
                $image_name = time().$rest.".".$exp;
                $target = "img/woman/".$image_name;
                move_uploaded_file($_FILES['image']['tmp_name'][$i], $target);
                array_push($name,$image_name,'|');
            }
            //text
            array_pop($name);
            $images = implode($name);

            $color = $_POST['color'];
            $colors = implode('|',$color);

            $size = $_POST[size];
            $sizes = implode('|',$size);

            $title = $_POST['title'];
            $price = $_POST['price'];
            $brand = $_POST['brand'];
            $category = $_POST['category'];
            $sub_cat = $_POST['subcat'];
            $sub_sub_cat = $_POST['subsubcat'];
            $mini_text = $_POST['minitext'];
            $datetime = date('Y-m-d H:i:s');
            $partner_id = $_SESSION['partner_id'];
            $country = $_POST['country'];
            $weight = $_POST['weight'];
            $instock = $_POST['instock'];

            if(isset($_POST['addproduct'])){
            $query = mysqli_query($conn, "
                UPDATE tovary
                SET 
                    title='$_POST[title]',
                    price='$_POST[price]',
                    brand='$_POST[brand]',
                    category='$_POST[category]',
                    sub_cat='$_POST[subcat]',
                    sub_sub_cat='$_POST[subsubcat]',
                    mini_text='$_POST[minitext]',
                    country='$_POST[country]',
                    weight='$_POST[weight]',
                    instock='$_POST[instock]'
                    ");
            if($query){
                echo '<script>alert("Товар добавлен")</script>';
                echo '<script>document.location="profile"</script>';
            }
            else{
                echo '<script>alert("Ошибка")</script>';
            }
            }
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data" style="padding-right: 5px;">
            <?php
            $query=$conn->query("SELECT * FROM tovary WHERE id=$_GET[id]");
            while ($row=mysqli_fetch_assoc($query)){ ?>
                <input type="text" class="form-control" value="<?=$row['title']?>"  name="title">
                <input type="tel" class="form-control" value="<?=$row['price']?>"  name="price">
                <input type="text" class="form-control" value="<?=$row['brand']?>"  name="brand">
                <input type="text" class="form-control" value="<?=$row['weight']?>" name="weight">
                <input type="text" class="form-control" value="<?=$row['color']?>" name="color">
                <input type="text" class="form-control" value="<?=$row['size']?>" name="size">
                <select name="category" onchange="showCat(this.value)" class="form-control mb-1">
                    <option value="<?=$row['title']?>"><?=$row['category']?></option>
                    <option value="<?=$row['title']?>"><?=$row['title']?></option>
                </select>
                <div class="form-control mb-1">
                    <p>Выберите цвет:</p>
                    Черный <input type="checkbox" name="color[]" value="black">
                    Белый <input type="checkbox" name="color[]" value="white">
                    Красный <input type="checkbox" name="color[]" value="red">
                    Синий <input type="checkbox" name="color[]" value="blue">
                    Бежевый <input type="checkbox" name="color[]" value="bezh">
                    Коричневый <input type="checkbox" name="color[]" value="brown">
                    Розовый <input type="checkbox" name="color[]" value="pink">
                    Желтый <input type="checkbox" name="color[]" value="yellow">
                </div>
                <div class="form-control mb-1">
                    <p>Размер одежды:</p>
                    X <input type="checkbox" name="size[]" value="x">
                    M <input type="checkbox" name="size[]" value="m">
                    L <input type="checkbox" name="size[]" value="l">
                    XL <input type="checkbox" name="size[]" value="xl">
                    XXL <input type="checkbox" name="size[]" value="xxl">
                </div>
                <div class="form-control mb-1">
                    <p>Размер обуви:</p>
                    20-25 <input type="checkbox" name="size[]" value="20-25">
                    25-30 <input type="checkbox" name="size[]" value="25-30">
                    30-35 <input type="checkbox" name="size[]" value="30-35">
                    35-40 <input type="checkbox" name="size[]" value="35-40">
                    40-45 <input type="checkbox" name="size[]" value="40-45">
                </div>
                <select name="category" onchange="showCat(this.value)" class="form-control mb-1">
                    <option value="0">Выбрать категорию</option>
                    <option value="1">ВЕРХНЯЯ ОДЕЖДА</option>
                    <option value="2">ОДЕЖДА</option>
                    <option value="3">ОБУВЬ</option>
                    <option value="4">ДЕТСКИЙ МИР</option>
                    <option value="5">АКСЕССУАРЫ И УКРАШЕНИЯ</option>
                    <option value="6">ПОСУДА И ПРЕДМЕТЫ ИНТЕРЬЕРА</option>
                    <option value="7">КАНЦЕЛЯРСКИЕ ТОВАРЫ</option>
                    <option value="8">ДОМАШНИЙ ТЕКСТИЛЬ</option>
                    <option value="9">КРАСОТА И ЗДОРОВЬЕ</option>
                    <option value="10">СПОРТ И ТУРИЗМ</option>
                    <option value="11">ДОМ И САД</option>
                    <option value="12">МЕБЕЛЬ</option>
                    <option value="13">ЭЛЕКТРОНИКА</option>
                    <option value="14">СТРОИТЕЛЬСТВО И РЕМОНТ</option>
                    <option value="15">БЫТОВАЯ ТЕХНИКА</option>
                    <option value="16">АВТОТОВАРЫ</option>
                </select>
                <select name="subsubcat" id="subsubkat" class="form-control mb-1">
                    <option value="0">Выберите подраздел </option>
                </select>
                <select name="country" class="form-control" >
                    <option value="">Производство </option>
                    <option value="Китай"><?=$row['country']?></option>
                    <option value="Турция">Турция</option>
                    <option value="Россия">Россия</option>
                    <option value="Италия">Италия</option>
                    <option value="Франция">Франция</option>
                </select>
                <textarea placeholder="<?=$row['mini_text']?>" name="minitext" class="form-control mb-1 mt-1" cols="40" rows="20"></textarea>
                <input type="file" multiple name="image[]" class="form-control" >

            <?php }
            ?>
            <input type="submit" value="Добавить" class="form-control btn-success" name="addproduct">
        </form>
    </div>

    <div class="clearfix"></div>

<script>
    function showCat(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("subkat").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","cat-ajax?q="+str,true);
            xmlhttp.send();
        }
    }

    function showSubCat(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("subsubkat").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","cat-ajax?g="+str,true);
            xmlhttp.send();
        }
    }
</script>
</body>
</html>
