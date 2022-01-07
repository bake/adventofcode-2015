<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day15;

class Ingredient
{
  public function __construct(
    public readonly int $capacity,
    public readonly int $durability,
    public readonly int $flavor,
    public readonly int $texture,
    public readonly int $calories,
  ) {
  }

  public static function empty(): self
  {
    return new self(0, 0, 0, 0, 0);
  }

  public function score(): int
  {
    return
      max(0, $this->capacity) *
      max(0, $this->durability) *
      max(0, $this->flavor) *
      max(0, $this->texture);
  }

  public function add(self $ingredient): self
  {
    return new self(
      $this->capacity + $ingredient->capacity,
      $this->durability + $ingredient->durability,
      $this->flavor + $ingredient->flavor,
      $this->texture + $ingredient->texture,
      $this->calories + $ingredient->calories,
    );
  }

  public function times(int $amount): self
  {
    return new self(
      $this->capacity * $amount,
      $this->durability * $amount,
      $this->flavor * $amount,
      $this->texture * $amount,
      $this->calories * $amount,
    );
  }
}
