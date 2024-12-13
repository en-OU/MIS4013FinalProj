<div style="text-align: center; padding: 50px;">
  <span style="font-weight: bold; color: blue; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 15px;">Book Catalog</span>
  <br/>
  <br/>
  <span style="color: violet; font-size: 20px; display: inline-block;">Books</span>
</div>

<script src="/path/to/masonry.pkgd.min.js"></script>

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
  <?php
    while ($book = $books->fetch_assoc()) {
  ?> 
  <h5 class="grid-title"> <?php echo ($book['BookTitle']); ?> </h5>
  <div class="grid-item">
    <small class="text-body-secondary">Author: <?php echo ($book['Author_Name']); ?></small><br>
  </div>
  <div class="grid-item grid-item--width2">
    <small class="text-body-secondary">Publish Date: <?php ($book['PublishDate']); ?></small><br>
  </div>
  <div class="grid-item">
    <small class="text-body-secondary">ISBN: <?php echo ($book['ISBN']); ?></small>
  </div>
    <div class="grid-item">
      <small class="text-body-secondary">Price: $ <?php echo ($book['Price']); ?></small>
    </div>
   <div>
     <small class="text-body-secondary">Rating: <?php echo ($book['Rating']); ?></small>
   </div>
</div>
<?php 
    }
?>
</div>
