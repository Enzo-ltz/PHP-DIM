<?php

final class Database
{
    private static ?self $instance = null;
    private PDO $pdo;

    private function __construct($path)
    {
        $this->pdo = new PDO("sqlite:/$path");
    }

    public static function initialize($path)
    {
        if (self::$instance !== null) {
            throw new Exception("configuration as already been initialized");
        }
        self::$instance = new self($path);
    }

    public static function getInstance(): PDO
    {
        return self::$instance->pdo;
    }
}