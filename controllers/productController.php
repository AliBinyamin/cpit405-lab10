<?php
// controllers/productController.php
require_once __DIR__ . '/../models/ProductModel.php';

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {

    case 'add':
        $name  = trim($_POST['name'] ?? '');
        $price = (float)($_POST['price'] ?? 0);
        $stock = (int)($_POST['stock'] ?? 0);

        if ($name === '' || $price <= 0) {
            $msg = 'Please fill product name and a positive price.';
        } else {
            ProductModel::create($name, $price, $stock);
            $msg = 'Product added successfully ✅';
        }

        header('Location: ../views/page1.php?message=' . urlencode($msg));
        break;

    case 'delete':
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            ProductModel::delete($id);
            $msg = 'Product deleted 🗑️';
        } else {
            $msg = 'Invalid product id.';
        }
        header('Location: ../views/page1.php?message=' . urlencode($msg));
        break;

    case 'update':
        $id    = (int)($_POST['id'] ?? 0);
        $name  = trim($_POST['name'] ?? '');
        $price = (float)($_POST['price'] ?? 0);
        $stock = (int)($_POST['stock'] ?? 0);

        if ($id <= 0 || $name === '' || $price <= 0) {
            $msg = 'Please fill all fields correctly for update.';
        } else {
            ProductModel::update($id, $name, $price, $stock);
            $msg = "Product #$id updated ✏️";
        }

        header('Location: ../views/page1.php?message=' . urlencode($msg));
        break;

    default:
        header('Location: ../views/page1.php');
}