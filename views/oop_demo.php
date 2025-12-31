<?php
require_once __DIR__ . '/../models/PersonProfessor.php';


$person    = new Person("Ali");
$professor = new Professor("Dr. Ahmed", 18500.0);

$personSpeak    = $person->speak();
$professorSpeak = $professor->speak();    
$professorTeach = $professor->teach();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 10 – OOP Demo (Person / Professor)</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">
</head>
<body>
<header class="topbar">
    <h1>Lab 10 – OOP Demo (Person / Professor)</h1>
    <nav class="topnav">
        <a href="page1.php">Products</a>
        <a href="page2.php">Databases</a>
        <a href="page3.php">Power Tool</a>
        <a href="oop_demo.php" class="active">OOP Demo</a>
    </nav>
</header>

<main class="main">
    <section class="card">
        <h2>UML Diagram → PHP Classes</h2>
        <p class="muted small">
            This page translates the UML diagram
            <strong>Person ← Professor</strong> into PHP classes and shows a small demo.
        </p>

        <div class="summary-grid">
            <article class="summary-card">
                <p class="summary-label">Person</p>
                <p class="summary-value">name: String</p>
            </article>
            <article class="summary-card">
                <p class="summary-label">Professor (extends Person)</p>
                <p class="summary-value">salary: Float</p>
            </article>
            <article class="summary-card">
                <p class="summary-label">Methods</p>
                <p class="summary-value">speak(), getName(), teach()</p>
            </article>
        </div>

        <section class="card mt">
            <h3>Demo Output</h3>
            <p><strong>$person = new Person("Ali")</strong></p>
            <ul>
                <li><code>$person-&gt;speak()</code> → <?= htmlspecialchars($personSpeak) ?></li>
                <li><code>$person-&gt;getName()</code> → <?= htmlspecialchars($person->getName()) ?></li>
            </ul>

            <p class="mt"><strong>$professor = new Professor("Dr. Ahmed", 18500.0)</strong></p>
            <ul>
                <li><code>$professor-&gt;speak()</code> (inherited) → <?= htmlspecialchars($professorSpeak) ?></li>
                <li><code>$professor-&gt;teach()</code> → <?= htmlspecialchars($professorTeach) ?></li>
                <li><code>$professor-&gt;getSalary()</code> → <?= number_format($professor->getSalary(), 2) ?> SAR</li>
            </ul>
        </section>
    </section>
</main>

<script src="../js/script1.js"></script>
</body>
</html>