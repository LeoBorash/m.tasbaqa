<div class="popular-products products">
    <h4>Популярные товары</h4>
    <?php
    $query = $conn->query("
      SELECT tovary.*, cat2.cat_title,cat2.cat_id
      FROM tovary 
      INNER JOIN cat2
      ON tovary.category = cat2.tovar_id  ORDER BY data ASC LIMIT 4");
    while ($row = mysqli_fetch_assoc($query)):
        $img = explode('|',$row['img']);?>
        <a href="https://www.tasbaqa.kz/shop-left-sidebar.php?id=<?=$row['cat_id']?>">
            <div class="tovar">
                <div class="block-tovar">
                    <h6><?=$row['cat_title']?>  →</h6>
                    <img src="img/woman/<?=$img[0]?>" alt="">
                    <p><?=$row['title']?></p>
                    <p><?=$row['price']?> ₸</p>
                </div>
            </div>
        </a>
    <?php endwhile;
    ?>
</div>

