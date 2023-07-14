<?php

namespace Core\Domain\Shared\Repository;

interface RepositoryInterface
{
    public function create($entity);

    public function update($entity): void;

    public function find($id);

    public function findAll(): array;
}