<?php

namespace Core\Product\Entity;

use Exception;

class Product implements ProductInterface
{
    private string $_id;
    private string $_name;
    private float $_price;

    public function __construct(string $id, string $name, float $price)
    {
        $this->_id = $id;
        $this->_name = $name;
        $this->_price = $price;
        $this->validate();
    }

    public function getId(): string
    {
        return $this->_id;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getPrice(): float
    {
        return $this->_price;
    }

    public function changeName(string $name): void
    {
        $this->_name = $name;
        $this->validate();
    }

    public function changePrice(float $price): void
    {
        $this->_price = $price;
        $this->validate();
    }

    public function validate(): bool
    {
        if (strlen($this->_id) === 0) {
            throw new Exception("Id is required");
        }
        if (strlen($this->_name) === 0) {
            throw new Exception("Name is required");
        }
        if ($this->_price < 0) {
            throw new Exception("Price must be greater than zero");
        }
        return true;
    }
}
