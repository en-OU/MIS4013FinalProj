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

