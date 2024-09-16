<?php
class Database {
    private static $pdo = null;

    public static function connect() {
        if (self::$pdo == null) {
            $dsn = 'mysql:host=localhost;dbname=secureapp';
            self::$pdo = new PDO($dsn, 'root', '');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}

