<?php
include 'db.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM products WHERE id = ?");
$query->execute([$id]);
$product = $query->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Ürün bulunamadı!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $product['name'] ?></title>
</head>
<body>
    <h1><?= $product['name'] ?></h1>
    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    <p><?= $product['description'] ?></p>
    <p>Fiyat: <?= $product['price'] ?> TL</p>
    <form action="process.php" method="POST">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <button type="submit" name="add_to_cart">Sepete Ekle</button>
    </form>
    <a href="index.php">Geri Dön</a>
</body>
</html>
