<?php

class Database {
    private $conn;
    private $stmt;

    public function __construct($dsn = "mysql:host=localhost;dbname=shopping_cart;user=root") {

        try {
            $this->conn = new PDO($dsn);
        } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

       $this->conn->exec("set names utf8");
       $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($query, $params = []) {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function find() {
        return $this->stmt->fetch();
    }


    public function findOrFail() {
        $result = $this->find();
        if(!$result) {
            abort();
        }
        return $result;
    }

    public function get() {
        $result = $this->stmt->fetchAll();
        return $result;
    }
}