<?php

namespace Main\Zandstra\Chapter3;

class CDProduct extends ShopProduct
{
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        int | float $price,
        private int $playLength
    )
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }
    
    public function getPlayLength(): int
    {
        return $this->playLength;
    }
    
    public function getSummaryLine(): string
    {
        $base  = "{$this->getTitle()} ( {$this->getProducerMainName()}, ";
        $base .= "{$this->getProducerFirstName()} )";
        $base .= ": Время звучания - {$this->playLength}";
        return $base;
    }
}
