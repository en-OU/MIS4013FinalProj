<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 15px;">Book Catalog</span>
  <br/>
  <br/>
</div>
<link rel="stylesheet" href="grid-styles.css">
</head>

<body>
<script src="/path/to/masonry.pkgd.min.js"></script>

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
  <?php
    while ($book = $books->fetch_assoc()) {
  ?> 
  <div class="grid-item" >
      <img src="ADEcover.jpg" style="height: auto; margin-right: 10px; object-fit: contain;>
  </br>
    <small class="text-body-primary"> <?php echo ($book['BookTitle']); ?> </small>
  
    <small class="text-body-secondary">Author: <?php echo ($book['Author_Name']); ?></small>
  </br>
    <small class="text-body-secondary">Publish Date: <?php ($book['PublishDate']); ?></small>
    </br>
    <small class="text-body-secondary">ISBN: <?php echo ($book['ISBN']); ?></small>
    </br>
  </div>
      <small class="text-body-secondary">Price: $ <?php echo ($book['Price']); ?></small>
      </br>
     <small class="text-body-secondary">Rating: <?php echo ($book['Rating']); ?></small>
   </div>
</div>
<?php 
    }
?>
</div>

</body>
</html>
