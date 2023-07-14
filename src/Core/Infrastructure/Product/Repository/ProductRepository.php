<?php

namespace Core\Infrastructure\Product\Repository;

use Core\Domain\Product\Entity\Product;
use Core\Domain\Product\Repository\ProductRepositoryInterface;
use Core\Infrastructure\Product\Model\ProductModel;
use Core\Infrastructure\Orm\Config;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        Config::connection();
    }

    public function create($entity)
    {
        ProductModel::create([
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'price' => $entity->getPrice(),
        ]);
    }

    public function update($entity): void
    {
        ProductModel::where('id', $entity->getId())->update([
            'name' => $entity->getName(),
            'price' => $entity->getPrice(),
        ]);
    }

    public function find($id)
    {
        $productModel = ProductModel::where('id', $id)->first();

        if (empty($productModel)) {
            return null;
        }

        return new Product(
            $productModel->id,
            $productModel->name,
            $productModel->price
        );
    }

    public function findAll(): array
    {
        $productModels = ProductModel::all();

        if (empty($productModels)) {
            return [];
        }

        $products = [];

        foreach ($productModels as $productModel) {
            $products[] = new Product(
                $productModel->id,
                $productModel->name,
                $productModel->price
            );
        }

        return $products;
    }

    public function findByName(string $name)
    {
        $productModel = ProductModel::where('name', $name)->first();

        if (empty($productModel)) {
            return null;
        }

        return new Product(
            $productModel->id,
            $productModel->name,
            $productModel->price
        );
    }

    public function delete($id): void
    {
        ProductModel::where('id', $id)->delete();
    }
}
