<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="background-color: white; font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Cart</span>
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
    <div class="cart">
    <h2>Your Shopping Cart</h2>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $total = 0;
        foreach ($_SESSION['cart'] as $book_id => $item) {
            echo "<p>Book: " . $item['title'] . "<br>";
            echo "Price: $" . number_format($item['price'], 2) . "<br>";
            echo "Quantity: " . $item['quantity'] . "</p>";
            $total += $item['price'] * $item['quantity'];
        }
        echo "<h3>Total: $" . number_format($total, 2) . "</h3>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</div>

<form method="POST">
    <button type="submit" name="clear_cart">Clear Cart</button>
</form>

<?php
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);  // This will clear the cart
}
?>
    
</body>
</html>
