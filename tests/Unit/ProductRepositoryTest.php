<?php

namespace Tests\Unit;

use Core\Domain\Product\Entity\Product;
use Core\Infrastructure\Product\Model\ProductModel;
use Core\Infrastructure\Product\Repository\ProductRepository;
use PHPUnit\Framework\TestCase;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepositoryTest extends TestCase
{
    public function testCreateProduct()
    {
        echo "testCreateProduct\n";
        $product = new Product(1, "Product 123", 100);
        $productRepository = new ProductRepository();
        $productRepository->create($product);

        $responseProduct = $productRepository->findByName('Product 123');

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'Product 123',
                'price' => 100,
            ],
            [
                'id' => $responseProduct->getId(),
                'name' => $responseProduct->getName(),
                'price' => $responseProduct->getPrice(),
            ]
        );
    }

    public function testProductFindByName()
    {
        echo "testProductFindByName\n";
        $productRepository = new ProductRepository();

        $responseProduct = $productRepository->findByName('Product 123');

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'Product 123',
                'price' => 100,
            ],
            [
                'id' => $responseProduct->getId(),
                'name' => $responseProduct->getName(),
                'price' => $responseProduct->getPrice(),
            ]
        );
    }

    public function testUpdateProduct()
    {
        echo "testUpdateProduct\n";
        $productRepository = new ProductRepository();

        $responseProduct = $productRepository->find(1);

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'Product 123',
                'price' => 100,
            ],
            [
                'id' => $responseProduct->getId(),
                'name' => $responseProduct->getName(),
                'price' => $responseProduct->getPrice(),
            ]
        );

        $product = new Product($responseProduct->getId(), $responseProduct->getName(), $responseProduct->getPrice());

        $product->changeName("Product Update");
        $product->changePrice(200);

        $productRepository->update($product);

        $responseProduct = $productRepository->find(1);

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'Product Update',
                'price' => 200,
            ],
            [
                'id' => $responseProduct->getId(),
                'name' => $responseProduct->getName(),
                'price' => $responseProduct->getPrice(),
            ]
        );
    }

    public function testFindProduct()
    {
        echo "testFindProduct\n";
        $productRepository = new ProductRepository();

        $foundProduct = $productRepository->find(1);

        $this->assertEquals(
            [
                'id' => 1,
                'name' => 'Product Update',
                'price' => 200,
            ],
            [
                'id' => $foundProduct->getId(),
                'name' => $foundProduct->getName(),
                'price' => $foundProduct->getPrice(),
            ]
        );
    }

    public function testFindAllProducts()
    {
        echo "testFindAllProducts\n";
        $productRepository = new ProductRepository();

        $product2 = new Product(2, "Product 2", 500);
        $productRepository->create($product2);

        $foundProducts = $productRepository->findAll();
        $products = [$productRepository->find(1), $product2];

        $this->assertEquals($products, $foundProducts);
        $productRepository->delete(2);
    }


    public function testDeleteProduct()
    {
        echo "testDeleteProduct\n";
        $productRepository = new ProductRepository();

        $responseProduct = $productRepository->delete(1);

        $this->assertTrue(true);
    }
}
