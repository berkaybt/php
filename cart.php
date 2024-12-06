<?php
session_start();
include 'db.php';

$cart = $_SESSION['cart'] ?? [];
$products = [];

if (!empty($cart)) {
    $placeholders = implode(',', array_fill(0, count($cart), '?'));
    $query = $conn->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $query->execute($cart);
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sepetim</title>
</head>
<body>
    <h1>Sepetim</h1>
    <?php if (empty($products)): ?>
        <p>Sepetiniz boş.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <?= $product['name'] ?> - <?= $product['price'] ?> TL
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php">Alışverişe Devam Et</a>
</body>
</html>
