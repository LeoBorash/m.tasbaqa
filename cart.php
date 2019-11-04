<?php session_start();
include 'includes/db.php';
if(isset($_SESSION['user_id']) or isset($_SESSION['partner_id'])){
    if (isset($_POST['text'])){

        $query = $conn->query("
        SELECT * FROM cart 
        WHERE tovar_id='$_POST[text]'");
        if (mysqli_num_rows($query)==1){
            $query = $conn->query("SELECT COUNT(*) as total FROM cart");
            $count = mysqli_fetch_assoc($query);
            echo $count['total'];
            $query = $conn->query("INSERT INTO cart(user_id, tovar_id)VALUES ('$_SESSION[user_id]','$_POST[text]')");
            $query = $conn->query("SELECT COUNT(*) as total FROM cart");
            $count = mysqli_fetch_assoc($query);
            echo $count['total'];
        }


    }
}
else{
    echo 'Пожалуйста авторизуйтесь';
}
