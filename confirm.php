<?php session_start();
include 'includes/db.php';
if(isset($_GET['email'])|| isset($_GET['token'])){
    $email = $conn->real_escape_string($_GET['email']);
    $token = $conn->real_escape_string($_GET['token']);
    $query = mysqli_query($conn,"UPDATE partner SET confirm=1,token='' WHERE email = '$email'");
    $_SESSION['email'] = $_GET['email'];
    while ($row = mysqli_fetch_assoc($query)){
        $_SESSION['confirm']=$row['confirm'];
    }
    if($query){
        echo '<script>alert("Активация прошла успешно")</script>';
        header('location: index');
    }else{  echo 'не Получилось';  }
    exit();
}

if(isset($_GET['semail'])|| isset($_GET['soken'])){
    $semail = $conn->real_escape_string($_GET['semail']);
    $soken = $conn->real_escape_string($_GET['soken']);
    $query = mysqli_query($conn,"UPDATE users SET confirm=1,soken='' WHERE email = '$semail'");
    $_SESSION['semail'] = $_GET['semail'];
    while ($row = mysqli_fetch_assoc($query)){
        $_SESSION['confirm']=$row['confirm'];
    }
    if($query){
        echo '<script>alert("Активация прошла успешно")</script>';
        header('location: index');
    }else{  echo 'не Получилось';  }
}