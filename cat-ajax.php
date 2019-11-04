<?php
$conn = mysqli_connect("srv-pleskdb21.ps.kz","tasba_leo","MyPassword3","tasbaqak_leo");


$q = intval($_GET['q']);


$query = mysqli_query($conn,"SELECT * FROM sub_cat WHERE cat_id = '".$q."'");



while($row = mysqli_fetch_assoc($query)) {
    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';

}
mysqli_close($conn);
?>

<?php
$conn = mysqli_connect("srv-pleskdb21.ps.kz","tasba_leo","MyPassword3","tasbaqak_leo");


$g = intval($_GET['g']);

$query = mysqli_query($conn,"SELECT * FROM sub_sub_cat WHERE sub_cat_id = '".$g."'");

while($row = mysqli_fetch_assoc($query)) {
    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
}
mysqli_close($conn);
?>


