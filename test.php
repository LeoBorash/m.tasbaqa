<!doctype html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<?php
    $text = "Google";
?>
    <p id="text"><?=$text?></p>
<span id="wwdw">dwadwa </span>

<p id="w"></p>
    <button id="btn">Отправить</button>

    <div id="mil"></div>
<script>
    $("#btn").click(function(){
        var str = $("#text").text();
        $.ajax({
            method: "POST",
            url: "test2",
            dataType: "text",
            data: {text: str},
            success: function(data)
            {
              $("#mil").html(data);
            }});
    });
</script>
<p id="good">Good Never is</p>
<button id="btn2">SEND</button>

<p id="result"></p>
<script>
    $("#btn2").click(function () {
        var str = $("#good").text();
        $.ajax({
            method: "POST",
            url: "test2",
            dataType: "text",
            data: {text: str},
            success: function(data)
            {
                $("#result").html(data);
            }});
    });
    test
</script>
</body>
</html>