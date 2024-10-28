<?php

namespace Main\Zandstra\Chapter4;

use Main\Zandstra\Chapter3\BookProduct;
use Main\Zandstra\Chapter3\CDProduct;

class ShopProduct
{
    const AVAILABLE = 0;
    const OUT_OF_STOCK = 1;
    private int $id = 0;
    private int|float $discount = 0;
    
    public function __construct(
        private string $title,
        private string $producerFirstName,
        private string $producerMainName,
        protected int|float $price
    ) {
    }
    
    public function getProducerFirstName(): string
    {
        return $this->producerFirstname;
    }
    
    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }
    
    public function setDiscount(int|float $num): void
    {
        $this->discount = $num;
    }
    
    public function getDiscount(): int
    {
        return $this->discount;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function getPrice(): int|float
    {
        return ($this->price - $this->discount);
    }
    
    public function getProducer(): string
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }
    
    public function getSummaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }
    
    public function setID(int $id): void
    {
        $this->id = $id;
    }
    
    public static function getInstance(int $id, \PDO $pdo): ShopProduct
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();
        
        if (empty($row))
        {
            return null;
        }
        
        if ($row['type'] == "book")
        {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['numpages']
            );
        }
        elseif ($row['type'] == "cd")
        {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['platlength']
            );
        }
        else
        {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float) $row['price']
            );
        }
        
        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
        return $product;
    }
}

// $dsn = "sqlite:/tmp/products.sqlite3";
// $pdo = new \PDO($dsn, null, null);
// $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
// $obj = ShopProduct::getInstance(1, $pdo);

//print ShopProduct::AVAILABLE;
