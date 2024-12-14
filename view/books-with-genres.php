<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="background-color: white; font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Books By Genre</span>
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
            background-color: rgba(255, 255, 255, 0.5); 
        }
    </style>
  
</head>

<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>

<script>
  $('.grid').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.grid-item',
  // use element for option
  columnWidth: '.grid-sizer',
  percentPosition: true
})
</script>
  
<div class="grid">
  <?php
  while ($genre = $genres->fetch_assoc()) {
  ?> 
    <div class="grid-item"> 
      <small style="color:#006400; font-weight: bold; font-size: 25px;"><?php echo $genre['GenreName']; ?></small>
      <?php
        $books = selectBooksByGenre($genre['GenreID']);
        while ($book = $books->fetch_assoc()) {
      ?>
        <small class="text-body-primary"><?php echo $book['BookTitle'];?></small>
        </br>
        <small class="text-body-secondary">Author: <?php echo $book['AuthorFN']; ?> <?php echo $book['AuthorLN']; ?></small>
      <?php   
        }
      ?>
    </div> <!-- Closing the grid-item here -->
  <?php
  }
  ?>
</div>
</body>
</html>
