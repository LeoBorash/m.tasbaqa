<?php
if(isset($_POST['gopartauth'])){
    $email = $conn->real_escape_string(trim($_POST['email']));
    $pass = $conn->real_escape_string(md5(trim($_POST['pass'])));

    $query = $conn->query("SELECT * FROM partner WHERE email = '$email'");
    if(mysqli_num_rows($query)==1){
        $query = $conn->query("SELECT * FROM partner WHERE email = '$email' AND pass = '$pass'");
        if(mysqli_num_rows($query)==1) {
            $query = $conn->query("SELECT * FROM partner WHERE email = '$email' AND pass = '$pass' AND confirm = '1'");
            if(mysqli_num_rows($query)==1) {
                while ($row = mysqli_fetch_assoc($query)){
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['sname'] = $row['sname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['partner_id'] = $row['partner_id'];
                }
                echo '<script>document.location="index"</script>';
            }else{echo '<script>alert("Почта не активирован")</script>';
            }
        }else{echo '<script>alert("Не верный пароль")</script>';
        }
    }else{
        echo '<script>alert("Такой Email не существует")</script>';
    }
}
?>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="post">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $_POST['email'] ?>">
                        <input type="password" class="form-control" placeholder="Пароль" name="pass">
                        <label><a href="#" class="napomnit">Забыли пароль?</a> </label>
                        <button type="submit" class="btn btn-success w-100" name="gopartauth">Вход</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
