<div style="text-align: center; padding: 50px;">
  <span style="font-weight: bold; color: blue; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 15px;">Books with Authors</span>
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
      <h5 class="card-title"><?php echo $author['AuthorLN']; ?></h5>
      <p class="card-text">
      <ul class="list-group">
     <p class="card-text"><small class="text-body-secondary">Full Name: <?php echo $author['AuthorFN']; ?> <?php echo $author['AuthorLN']; ?></small></p>

        
      <?php
        $books = selectBooksByAuthor($author['AuthorID']);
        while ($book = $books->fetch_assoc()) {
      ?>
      <li class="list-group-item"><?php echo $book['BookTitle']; ?> - <?php echo $book['PublishDate']; ?>
          - <?php echo $book['ISBN']; ?></li>
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
  
