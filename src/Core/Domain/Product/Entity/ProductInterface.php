<?php

namespace Core\Domain\Product\Entity;

interface ProductInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getPrice(): float;
    public function changeName(string $name): void;
    public function changePrice(float $price): void;
    public function validate(): bool;
}
