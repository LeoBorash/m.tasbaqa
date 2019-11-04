<?php
    if(isset($_POST['gouserreg'])) {
        $_SESSION['email'] = $conn->real_escape_string(trim($_POST['email']));
        $fname = $conn->real_escape_string(trim($_POST['fname']));
        $sname = $conn->real_escape_string(trim($_POST['sname']));
        $email = $conn->real_escape_string(trim($_POST['email']));
        $phone = $conn->real_escape_string(trim($_POST['phone']));
        $data = date("Y-m-d H:i:s");
        $agree = $conn->real_escape_string(trim($_POST['agree']));
        $pass = md5($_POST['pass']);
        $pass2 = md5($_POST['pass2']);
        $soken = "qwertyuiopasdfghjkl;'zxcvbnm,./1234567890-";
        $soken = str_shuffle($soken);
        $soken = substr($soken, 0, 10);

            if ($pass == $pass2) {
                $query=$conn->query("SELECT email FROM users WHERE email = '$email'");
            if(mysqli_num_rows($query)==1){
                echo 'Такой Email уже зарегестирован';
            }else{
                $query=$conn->query("SELECT phone FROM users WHERE phone = '$phone'");
                if(mysqli_num_rows($query)==1) {
                    echo 'Такой номер телефона уже существует';
                }else{
                    $query = mysqli_query($conn, "
                INSERT INTO users(fname, sname, email, pass, agree, phone, confirm, soken,data)
                VALUES ('$fname','$sname','$email','$pass','$agree','$phone','0','$soken','$data')");

                    $mail = new PHPMailer;
                    $mail->CharSet = 'utf-8';
                    $mail->isSMTP();
                    $mail->Host = 'smtp.mail.ru';                                                                                            // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;
                    $mail->Username = 'tasbaqamarket@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
                    $mail->Password = 'Holding2019@'; // Ваш пароль от почты с которой будут отправляться письма
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

                    $mail->setFrom('tasbaqamarket@mail.ru'); // от кого будет уходить письмо?
                    $mail->addAddress("$email");     // Кому будет уходить письмо
                    $mail->isHTML(true);
                    $mail->Subject = 'Активация аккаунта';
                    $mail->Body = " 
             <h4 >Добро пожаловать на сайт Tasbaqa Market!</h4>
                <div style='background: seagreen'>
                    <p style='font-size: 15px;'>Ваша почта была зарегистрирована на сайте Tasbaqa Market в качестве покупателя.
                        <br>Если это Вы подтвердите, пожалуйста, Ваше действие.</p>
                    <a href='https://m.tasbaqa.kz/confirm.php?email=$email&token=$soken' style='color: white; background: green; font-size: 18px;'>Подтвердить</a>
                    <br>
                    <br>
                    <p style='font-size: 15px;'>Если это не Вы, то игнорируйте это сообщение. <br>
                        Спасибо!
                        <br>
                        С уважением, Tasbaqa Market.</p>
                </div>
            ";
                    $mail->AltBody = '';

                    if (!$mail->send()) {
                        echo 'Error';
                    } else {
                        echo '<script>document.location="../check"</script>';
                    }
                }
            }

        } else {
            echo '<script>alert("Пароли не совпадают")</script>';
        }
    }
?>
<div id="myModalHreg" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="post" role="form">
                        <input type="text" class="form-control" placeholder="Имя" required name="fname" value="<?=$_POST['fname']?>">
                        <input type="text" class="form-control" placeholder="Фамилия" required name="sname" value="<?=$_POST['sname']?>">
                        <input type="email" class="form-control" placeholder="Email" required name="email" value="<?=$_POST['email']?>">
                        <input type="tel" class="form-control" placeholder="Телефон" required name="phone" value="<?=$_POST['phone']?>">
                        <input type="password" class="form-control" placeholder="Пароль" required name="pass">
                        <input type="password" class="form-control" placeholder="Подтвердите пароль" required name="pass2">
                        <div class="col-md-12" style="margin-top: 7px;">
                            <label style="font-size: 12px;">
                                <input type="checkbox" required value="1" name="agree">
                                Я согласен с
                                <a href="../agree.php"> обработкой персональных данных</a> и с
                                <a href="../uslov.php">условиями продажи </a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success w-100" name="gouserreg">Регистрация</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
