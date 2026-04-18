<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    public static function all() {
        global $pdo;
        return $pdo->query("SELECT * FROM profile")->fetchAll(PDO::FETCH_ASSOC);
    }
}
