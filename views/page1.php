<?php
require_once __DIR__ . '/../models/ProductModel.php';

$products     = ProductModel::all();
$totalCount   = ProductModel::countProducts();
$totalStock   = ProductModel::totalStock();
$message      = $_GET['message'] ?? '';
$editId       = isset($_GET['edit_id']) ? (int)$_GET['edit_id'] : 0;
$editProduct  = $editId > 0 ? ProductModel::find($editId) : null;

$isEditing    = $editProduct !== null;
$formTitle    = $isEditing ? "Edit Product #{$editProduct['id']}" : "Add New Product";
$buttonLabel  = $isEditing ? "Update Product" : "Save Product";
$formAction   = $isEditing ? "update" : "add";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 10 – PHP & MariaDB: Product Manager</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<header class="topbar">
    <h1>Lab 10 – PHP &amp; MariaDB: Product Manager</h1>
    <nav class="topnav">
         <a href="page1.php" class="active">Products</a>
        <a href="page2.php">Databases</a>
        <a href="page3.php">Power Tool</a>
        <a href="oop_demo.php">OOP Demo</a>
   </nav>
</header>

<main class="main">
    <?php if ($message): ?>
        <p class="flash" id="flashMessage"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <!-- Summary cards -->
    <section class="summary-grid">
        <article class="summary-card">
            <p class="summary-label">Total Products</p>
            <p class="summary-value"><?= $totalCount ?></p>
        </article>
        <article class="summary-card">
            <p class="summary-label">Total Stock Units</p>
            <p class="summary-value"><?= $totalStock ?></p>
        </article>
        <article class="summary-card">
            <p class="summary-label">Average Stock / Product</p>
            <p class="summary-value">
                <?= $totalCount ? round($totalStock / $totalCount, 1) : 0 ?>
            </p>
        </article>
    </section>

    <!-- Add / Edit form -->
    <section class="card">
        <div class="card-header">
            <h2><?= htmlspecialchars($formTitle) ?></h2>
            <?php if ($isEditing): ?>
                <a href="page1.php" class="link-muted small">Cancel edit</a>
            <?php endif; ?>
        </div>

        <form method="post" action="../controllers/productController.php" class="form" id="productForm">
            <input type="hidden" name="action" value="<?= $formAction ?>">
            <?php if ($isEditing): ?>
                <input type="hidden" name="id" value="<?= (int)$editProduct['id'] ?>">
            <?php endif; ?>

            <div class="field">
                <label for="name">Name:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= $isEditing ? htmlspecialchars($editProduct['name']) : '' ?>"
                    required
                >
            </div>

            <div class="field-inline">
                <div class="field">
                    <label for="price">Price (SAR):</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        step="0.01"
                        min="0"
                        value="<?= $isEditing ? htmlspecialchars($editProduct['price']) : '' ?>"
                        required
                    >
                </div>

                <div class="field">
                    <label for="stock">Stock:</label>
                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        min="0"
                        value="<?= $isEditing ? (int)$editProduct['stock'] : 0 ?>"
                    >
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><?= $buttonLabel ?></button>
        </form>
    </section>

    <!-- Products table -->
    <section class="card">
        <div class="card-header spaced">
            <h2>Current Products</h2>
            <div class="table-tools">
                <input
                    type="text"
                    id="searchInput"
                    class="search-input"
                    placeholder="Search by name…"
                    onkeyup="filterProducts()"
                >
            </div>
        </div>

        <?php if (!$products): ?>
            <p class="muted">No products yet. Add your first one above.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table id="productsTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price (SAR)</th>
                        <th>Stock</th>
                        <th>Created</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $p): ?>
                        <tr data-name="<?= htmlspecialchars(strtolower($p['name'])) ?>">
                            <td><?= $p['id'] ?></td>
                            <td><?= htmlspecialchars($p['name']) ?></td>
                            <td><?= number_format($p['price'], 2) ?></td>
                            <td><?= (int)$p['stock'] ?></td>
                            <td><?= $p['created_at'] ?></td>
                            <td class="text-right">
                                <a href="page1.php?edit_id=<?= $p['id'] ?>" class="link-small">Edit</a>
                                <span class="divider">|</span>
                                <a class="link-small link-danger"
                                   href="../controllers/productController.php?action=delete&id=<?= $p['id'] ?>"
                                   onclick="return confirmDelete('<?= htmlspecialchars($p['name']) ?>');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</main>

<script src="../js/script1.js"></script>
</body>
</html>