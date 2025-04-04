<?php include 'header.php'; ?>

<h2>Order Summary</h2>

<?php
$subtotal = 0;

foreach ($_GET['qty'] as $index => $qty) {
    $qty = intval($qty);
    if ($qty > 0) {
        $name = $_GET['name'][$index];
        $price = floatval($_GET['price'][$index]);
        $itemTotal = $qty * $price;
        $subtotal += $itemTotal;

        echo "<p><strong>$name</strong><br>";
        echo "Quantity: $qty<br>";
        echo "Price: $" . number_format($price, 2) . "<br>";
        echo "Total for item: $" . number_format($itemTotal, 2) . "</p>";
    }
}

$tax = $subtotal * 0.0625;
$total = $subtotal + $tax;

echo "<hr>";
echo "<p>Subtotal: $" . number_format($subtotal, 2) . "<br>";
echo "Tax (6.25%): $" . number_format($tax, 2) . "<br>";
echo "<strong>Total: $" . number_format($total, 2) . "</strong></p>";

echo "<p>Pickup Time: <strong>" . htmlspecialchars($_GET['pickupTime']) . "</strong></p>";

$first = htmlspecialchars($_GET['firstName']);
$last = htmlspecialchars($_GET['lastName']);
$notes = nl2br(htmlspecialchars($_GET['notes']));

echo "<p>Customer: $first $last</p>";
echo "<p>Special Instructions:<br>$notes</p>";
?>
