<?php

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/ProductError.php';

if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_FILES['fileToUpload']) || !isset($_POST['description']) || !isset($_POST['category'])) {
    redirect('/');
}

$productName = trim($_POST['name']);
$productPrice = trim($_POST['price']);
// $productCover = trim($_POST['cover']);
$productDescription = trim($_POST['description']);
$productCategory = $_POST['category'];
// on met le fichier dans une variable pour une meilleure lisibilité
$file = $_FILES['fileToUpload'];
// On récupère le nom du fichier
$fileName = uniqid() . "_" . date("YmdHis") . "_" . $file['name'];

if (empty($productName)) {
    redirect('/add-product.php?error=' . ProductError::NAME_REQUIRED);
}
if (empty($productPrice)) {
    redirect('/add-product.php?error=' . ProductError::PRICE_REQUIRED);
}
if (empty($filename)) {
    redirect('/add-product.php?error=' . ProductError::COVER_REQUIRED);
}
if (empty($productDescription)) {
    redirect('/add-product.php?error=' . ProductError::DESCRIPTION_REQUIRED);
}


// On construit le chemin de destination
$destination = __DIR__ . "/uploads/Products/" . $filename;
// On bouge le fichier temporaire dans la destination
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    echo $filename . " Non enregistré <br />";
}

try {
    $pdo = Database::getConnection();
} catch(PDOException $ex) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO product (name, price_vat_free, cover, description, category_id) VALUES (:productName, :productPrice, :productCover, :productDescription, :productCategory)");
$stmt->execute([
    'productName' => $productName,
    'productPrice' => $productPrice,
    'productCover' => $filename,
    'productDescription' => $productDescription,
    'productCategory' => $productCategory
]);

if ($stmt === false) {
    echo "Erreur lors de la requête";
    exit;
}

session_start();
$_SESSION['message'] = "Le produit a bien été enregistré";

redirect('/');