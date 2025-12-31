<?php
require_once __DIR__ . '/../models/Database.php';
$databases = Database::listDatabases();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 10 – Databases</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<header class="topbar">
    <h1>Available Databases (SHOW DATABASES)</h1>
    <nav class="topnav">
    <a href="page1.php">Products</a>
    <a href="page2.php" class="active">Databases</a>
    <a href="page3.php">Power Tool</a>
    <a href="oop_demo.php">OOP Demo</a>
</nav>
</header>

<main class="main">
    <section class="card">
        <div class="card-header spaced">
            <h2>Databases on this MariaDB server</h2>
            <span class="badge"><?= count($databases) ?> total</span>
        </div>

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Database name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($databases as $index => $db): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($db) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>
</body>
</html>