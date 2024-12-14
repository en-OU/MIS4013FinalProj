<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Book Catalog</span>
  <br/>
  <br/>
</div>
  
<link rel="stylesheet" href="grid-styles.css">
  <style>
        body {
            background-image: url('Bookpile.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            background-color: rgba(255, 255, 255, 0.5); // half white so it looks kind of transparent
        }
    </style>
  
</head>

<body>
<script src="/path/to/masonry.pkgd.min.js"></script>
<script>
  $('.grid').masonry({
  itemSelector: '.grid-item',
  columnWidth: 160
});
</script>

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
  <?php
    while ($book = $books->fetch_assoc()) {
  ?> 
  <div class="grid-item" >
    <img src="ADEcover.jpg" style="height: auto; margin-right: 10px; object-fit: contain;>
    </br>
    <small class="text-body-primary"> <?php echo ($book['BookTitle']); ?> </small>
      </br>
    <small class="text-body-secondary">Author: <?php echo ($book['Author_Name']); ?></small>
    </br>
    <small class="text-body-secondary">Publish Date: <?php ($book['PublishDate']); ?></small>
    </br>
    <small class="text-body-secondary">ISBN: <?php echo ($book['ISBN']); ?></small>
    </br>
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
