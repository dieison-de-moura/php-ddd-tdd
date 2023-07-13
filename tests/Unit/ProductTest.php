<?php

namespace Tests\Unit;

use Core\Product\Entity\Product;
use PHPUnit\Framework\TestCase;
use Exception;

class ProductTest extends TestCase
{
    public function testEmptyIdThrowsException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Id is required");
        $product = new Product("", "Product 1", 100);
    }

    public function testEmptyNameThrowsException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Name is required");

        $product = new Product("123", "", 100);
    }

    public function testNegativePriceThrowsException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Price must be greater than zero");

        $product = new Product("123", "Name", -1);
    }

    public function testNameChange()
    {
        $product = new Product("123", "Product 1", 100);
        $product->changeName("Product 2");
        $this->assertEquals("Product 2", $product->getName());
    }

    public function testPriceChange()
    {
        $product = new Product("123", "Product 1", 100);
        $product->changePrice(150);
        $this->assertEquals(150, $product->getPrice());
    }
}
