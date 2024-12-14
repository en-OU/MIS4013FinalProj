<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="background-color: white; font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Books By Genre</span>
  <br/>
  <br/>
</div>
  
</head>

<body>
<div class="card-group">
<?PHP

while ($genre = $genres->fetch_assoc()) {
?> 
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><?php echo $genre['GenreName']; ?></h5>
      <p class="card-text">
      <ul class="list-group">
        
      <?php
        $books = selectBooksByGenre($genre['GenreID']);
        while ($book = $books->fetch_assoc()) {
      ?>
      <li class="list-group-item">
          <?php echo $book['BookTitle']; ?> - <?php echo $book['PublishDate']; ?> - <?php echo $book['ISBN']; ?>
          <p class="card-text"><small class="text-body-secondary">Author: <?php echo $book['AuthorFN']; ?> <?php echo $book['AuthorLN']; ?></small></p>
      </li>
        <?php   
          }
        ?>
      </ul>
    </div>
  </div>
<?php
}
?>

</div>
</body>
</html>
