<?php include 'header.php'; ?>

<?php
$menu = [
    ['name' => 'HAWKEYE Bruger', 'desc' => 'Beef Excellency ', 'price' => 7.99, 'img' => 'burger.jpg'],
    ['name' => 'Honey AV n Toast', 'desc' => 'Avocado honey and egg on toast', 'price' => 6.49, 'img' => 'toast.jpg'],
    ['name' => 'Grande Latte', 'desc' => 'Starbucks but better', 'price' => 4.25, 'img' => 'latte.jpg'],
    ['name' => 'Lettuce', 'desc' => 'Salad', 'price' => 5.75, 'img' => 'salad.jpg'],
    ['name' => 'Munchkins', 'desc' => 'doe nhut', 'price' => 6.99, 'img' => 'wrap.jpg'],
    ['name' => 'Moofin', 'desc' => 'Chocolate chip moofin', 'price' => 2.99, 'img' => 'muffin.jpg']
];
?>

<form method="get" action="process_order.php" onsubmit="return validateForm();">
    <?php foreach ($menu as $index => $item): ?>
        <div style="margin: 20px 0;">
            <img src="images/<?= $item['img'] ?>" alt="<?= $item['name'] ?>" width="100"><br>
            <strong><?= $item['name'] ?></strong><br>
            <?= $item['desc'] ?><br>
            $<?= number_format($item['price'], 2) ?><br>
            Quantity:
            <select name="qty[<?= $index ?>]">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <input type="hidden" name="price[<?= $index ?>]" value="<?= $item['price'] ?>">
            <input type="hidden" name="name[<?= $index ?>]" value="<?= $item['name'] ?>">
        </div>
    <?php endforeach; ?>

    <!-- Customer Info -->
    <p>
        First Name: <input type="text" name="firstName" id="firstName">
        Last Name: <input type="text" name="lastName" id="lastName">
    </p>
    <p>
        Special Instructions:<br>
        <textarea name="notes" rows="4" cols="40"></textarea>
    </p>
    <input type="hidden" name="pickupTime" id="pickupTime">
    <input type="submit" value="Submit Order">
</form>

<script src="js/validation.js"></script>
