<?php

class DB
{
    private static $instance = null;
    private DB_HOST = 'localhost';
    private DB_NAME = 'akeneo';
    private DB_USER = 'root';
    private DB_PASS = 'root';

    private function __construct () {
        $this->instance = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
    }

    public static function getInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        }

        return new self;
    }
}

class Products
{
    
    public function getProducts()
    {
        $db = DB::getInstance();
        $products = $db->query('SELECT * FROM `products`');

        return $products;
    }
}



