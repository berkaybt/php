<?php
include 'db.php';

$query = $conn->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>E-Ticaret Sitesi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Ürünler</h1>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h2><?= $product['name'] ?></h2>
                <p><?= $product['price'] ?> TL</p>
                <a href="product.php?id=<?= $product['id'] ?>">Detay</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
