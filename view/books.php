<?php
session_start();  // Start the session to store cart data

// If the 'add_to_cart' form is submitted
if (isset($_POST['add_to_cart'])) {
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];
    
    // Check if the cart already exists, create it if not
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Add the book to the cart (using its ID as a key)
    if (isset($_SESSION['cart'][$book_id])) {
        // If the book already exists in the cart, just increase the quantity
        $_SESSION['cart'][$book_id]['quantity'] += 1;
    } else {
        // If the book is not in the cart, add it
        $_SESSION['cart'][$book_id] = array(
            'title' => $book_title,
            'price' => $book_price,
            'quantity' => 1
        );
    }
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="background-color: white; font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Book Catalog</span>
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
    while ($book = $books->fetch_assoc()) {
    $bookCoverImage = "images/" . $book['BookID'] . ".jpg"; // 

  ?> 
  <div class="grid-item"> 
    <img src="<?php echo $bookCoverImage; ?>" style="width: 100%; height: auto; object-fit: contain;">
    </br>
    </br>
    <small class="text-body-primary"> <?php echo ($book['BookTitle']); ?> </small>
      </br>
    <small class="text-body-secondary">Author: <?php echo ($book['Author_Name']); ?></small>
    </br>
    <small class="text-body-secondary">Publish Date: <?php echo ($book['PublishDate']); ?></small>
    </br>
    <small class="text-body-secondary">ISBN: <?php echo ($book['ISBN']); ?></small>
    </br>
    <small class="text-body-secondary">Price: $ <?php echo ($book['Price']); ?></small>
      </br>
    <small class="text-body-secondary">Rating: <?php echo ($book['Rating']); ?></small>

    <!-- Add to Cart Button -->
    <form method="POST">
      <input type="hidden" name="book_id" value="<?php echo $book['BookID']; ?>">
      <input type="hidden" name="book_title" value="<?php echo $book['BookTitle']; ?>">
      <input type="hidden" name="book_price" value="<?php echo $book['Price']; ?>">
      <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>
    
</div>
<?php 
    }
?>
</div>

</body>
</html>
