<?php session_start(); ?>
<html  lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .main{
            border: 2px solid green;
            padding: 4px;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="firstSentences">
        <p><b>На вашу электронную почту (<?php echo $_SESSION['email']?>) отправлено электронное письмо для подтверждения вашего адреса электронной почты.</b></p>
    </div>
    <div class="secondSentences">
        <p><b>Письмо содержит <font>ссылку для подтверждения адреса электронной почты.</font> Пройдите по ссылке, чтобы подтвердить регистрацию вашего аккаунта.</b></p>
    </div>
    <div class="thirdSentences">
        <p><b>Если вы не получили данное письмо, проверьте папки «Спам» и «Рассылки», так как письмо могло автоматически туда перейти.</b></p>
        <p style="padding-top: 20px;">*После подтверждения почты <a href="index">нажмите сюда</a>.</p>
    </div>
</div>
</body>
</html>








