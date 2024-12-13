<div style="text-align: center; padding: 50px;">
  <span style="font-weight: bold; color: blue; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 15px;">Book Catalog</span>
  <br/>
  <br/>
  <span style="color: violet; font-size: 20px; display: inline-block;">Books</span>
</div>

<div class="card-group">
<?php
while ($book = $books->fetch_assoc()) {
?> 
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"> <?php echo htmlspecialchars($book['BookTitle']); ?> </h5>
      <p class="card-text">
        <small class="text-body-secondary">Author: <?php echo ($book['Author_Name']); ?></small><br>
        <small class="text-body-secondary">Publish Date: <?php ($book['PublishDate']); ?></small><br>
        <small class="text-body-secondary">ISBN: <?php echo ($book['ISBN']); ?></small>
        <small class="text-body-secondary">Price: $ <?php echo ($book['Price']); ?></small>
        <small class="text-body-secondary">Rating: <?php echo ($book['Rating']); ?></small>
      </p>
    </div>
  </div>
<?php
}
?>
</div>
