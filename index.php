<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Bienvenue</h1>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des produits</h1>
    <ul class="produits">
        </ul>
</body>
</html>

<?php
$productsDb = new Products();
$products = $productsDb->findAll();

foreach ($products as $product) {
    echo "<li class='produit'>";
    echo "<h2>" . $product['name'] . "</h2>";
    echo "<img src='" . "/uploads/Products/" . $product['cover'] . "' alt='" . $product['name'] . "'>";
    echo "<p>" . $product['description'] . "</p>";
    echo "<span class='prix'>" . $product['price_vat_free'] . "€</span>";
    echo "</li>";
}
?>


<?php require_once __DIR__ . '/layout/footer.php'; ?>