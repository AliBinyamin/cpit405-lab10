<?php
// models/ProductModel.php
require_once __DIR__ . '/Database.php';

class ProductModel
{
    public static function all()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT * FROM products ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public static function create($name, $price, $stock)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            'INSERT INTO products (name, price, stock)
             VALUES (:name, :price, :stock)'
        );
        $stmt->execute([
            ':name'  => $name,
            ':price' => $price,
            ':stock' => $stock,
        ]);
    }

    public static function delete($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }

    public static function find($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public static function update($id, $name, $price, $stock)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            'UPDATE products
             SET name = :name, price = :price, stock = :stock
             WHERE id = :id'
        );
        $stmt->execute([
            ':id'    => $id,
            ':name'  => $name,
            ':price' => $price,
            ':stock' => $stock,
        ]);
    }

    public static function countProducts()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT COUNT(*) FROM products');
        return (int) $stmt->fetchColumn();
    }

    public static function totalStock()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT COALESCE(SUM(stock),0) FROM products');
        return (int) $stmt->fetchColumn();
    }
}