<div class="card">
<div class="card_title">
<?= $row['titel'] ?> 
</div>
    <img src="https://placekitten.com/g/200/300" class="card-img-top" alt="" 
    width="200"
    height="300">
     <div class="card-body">
        <?= $row['description'] ?>
        <hr>
        <?= $row['price'] ?> 
        </div>
        <div class="card_footer">
         <a href="" class="btn btn-primary btn-sm">Details</a>
         <a href="index.php/card/add/<?= $row['id']?>" class="btn btn-success btn-sm">In den Warenkorp</a>
        </div>
        </div>
