<?php
// models/Database.php
class Database
{
    private static $host = 'localhost';
    private static $dbname = 'lab10_shop';
    private static $user = 'root';      // change if needed
    private static $pass = '';          // change if needed

    public static function getConnection()
    {
        static $pdo = null;

        if ($pdo === null) {
            $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname . ';charset=utf8mb4';
            try {
                $pdo = new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                die('Database connection failed: ' . htmlspecialchars($e->getMessage()));
            }
        }

        return $pdo;
    }

    // For lab assessment #3: SHOW DATABASES
    public static function listDatabases()
    {
        $dsn = 'mysql:host=' . self::$host . ';charset=utf8mb4';

        $pdo = new PDO($dsn, self::$user, self::$pass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $pdo->query('SHOW DATABASES');
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}