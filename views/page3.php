<?php
$base   = $_GET['base'] ?? '';
$exp    = $_GET['exp'] ?? '';
$result = $_GET['result'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 10 – Power Function</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<header class="topbar">
    <h1>Power Calculator (base^exponent)</h1>
    <nav class="topnav">
    <a href="page1.php">Products</a>
    <a href="page2.php">Databases</a>
    <a href="page3.php" class="active">Power Tool</a>
    <a href="oop_demo.php">OOP Demo</a>
</nav>
</header>

<main class="main">
    <section class="card">
        <h2>Compute base<sup>exp</sup> using PHP</h2>
        <p class="muted small">
            This uses a recursive <code>power($base, $exp)</code> function implemented in <strong>MathModel.php</strong>.
        </p>

        <form method="post"
              action="../controllers/mathController.php"
              class="form"
              id="powerForm">
            <div class="field-inline">
                <div class="field">
                    <label for="base">Base:</label>
                    <input
                        type="number"
                        step="0.01"
                        name="base"
                        id="base"
                        value="<?= htmlspecialchars($base) ?>"
                        required
                    >
                </div>
                <div class="field">
                    <label for="exp">Exponent:</label>
                    <input
                        type="number"
                        name="exp"
                        id="exp"
                        value="<?= htmlspecialchars($exp) ?>"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Calculate</button>

            <div class="quick-buttons">
                <span class="small muted">Quick examples:</span>
                <button type="button" class="btn btn-chip" onclick="fillExample(2, 10)">2¹⁰</button>
                <button type="button" class="btn btn-chip" onclick="fillExample(5, 3)">5³</button>
                <button type="button" class="btn btn-chip" onclick="fillExample(10, 2)">10²</button>
            </div>
        </form>

        <?php if ($result !== ''): ?>
            <p class="flash mt">
                Result: <?= htmlspecialchars($base) ?>
                <sup><?= htmlspecialchars($exp) ?></sup>
                = <strong><?= htmlspecialchars($result) ?></strong>
            </p>
        <?php endif; ?>
    </section>
</main>

<script src="../js/script1.js"></script>
</body>
</html>