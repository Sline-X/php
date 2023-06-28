<?php

namespace Main\Zandstra\Chapter3;

class ShopProduct
{
    private int | float $discount = 0;
    
    public function __construct(
        private string $title,
        private string $producerFirstName,
        private string $producerMainName,
        protected int | float $price)
    {
    }
    
    public function getProducerFirstName(): string
    {
        return $this->producerFirstname;
    }
    
    public function getProducerMainName(): string
    {
        return $this->producerMainName;
    }
    
    public function setDiscount(int | float $num): void
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
    
    public function getPrice(): int | float
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
}

// $product1 = new ShopProduct('Каталог книг');

//Именованные аргументы
// $product2 = new ShopProduct(title: "Каталог", price: 0.7);

// $product1->arbitraryAddition = 'Дополнительный параметр';

// print "Автор: {$product1->getProducer()}\n";

// var_dump($product2);

// $resolve = 'false';
// function outputAddresses($resolve)
// {
//     if (is_string($resolve)) {
//         $resolve = (preg_match("/^(false|no|off)$/i", $resolve))
//             ? false : true;
//     }
//
// }
//is_countable() - массив объектов, который может быть передан функции count()
//is_iterable() - структура данных, которая может быть обойдена с помощью цикла foreach
//is_callable() - код, который может быть вызван, - зачастую это анонимная функция или функция, имеющая имя
//is_numeric() - int, long или строка, которая может быть преобразована в число
