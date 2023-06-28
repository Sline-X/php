<?php

namespace Main\Zandstra\Chapter3;

class ShopProductWriter
{
    private $products = [];
    public function addProduct(ShopProduct $shopProduct): void
    {
        $this->products[] = $shopProduct;
    }
    public function write(): void
    {
        $str = "";
        foreach ($this->products as $shopProduct)
        {
            $str .= "{$shopProduct->title}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        print $str;
    }
}
