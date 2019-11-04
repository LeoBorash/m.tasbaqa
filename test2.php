<?php
include 'includes/db.php';

//if (isset($_POST['text'])){
//    echo $_POST['text'];
//    echo '<br>';
//}
//
//if(isset($_POST['good']))
//{
//    echo $_POST['good'];
//}

//$query = $conn->query("SELECT * FROM test");
//while ($row = mysqli_fetch_assoc($query)){
//    $title = array('apple','banana');
//    echo '<br>';
//    echo count($title);
//    foreach ($title as $key){
//        echo $key;
//    }
//}
$result=mysqli_query($conn,"SELECT count(*) as total from test");
$data=mysqli_fetch_assoc($result);
echo $data['total'];