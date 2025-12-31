<?php
// controllers/mathController.php
require_once __DIR__ . '/../models/MathModel.php';

$base = $_POST['base'] ?? 0;
$exp  = $_POST['exp'] ?? 0;

$result = MathModel::power($base, $exp);

// Redirect back to page3 with result in query string
header('Location: ../views/page3.php?base=' . urlencode($base) .
       '&exp=' . urlencode($exp) .
       '&result=' . urlencode($result));