<?php

namespace Core\Domain\Product\Repository;

use Core\Domain\Shared\Repository\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    // método apenas no contexto de produto
    function delete($id): void;

    function findByName(string $name);
}