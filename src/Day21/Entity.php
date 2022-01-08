<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day21;

class Entity
{
  public function __construct(
    public readonly string $name,
    public readonly int $hit_points,
    public readonly int $damage,
    public readonly int $armor,
  ) {
  }

  public function takeDamage(int $hit_points): self
  {
    return new self(
      $this->name,
      $this->hit_points - max($hit_points - $this->armor, 1),
      $this->damage,
      $this->armor,
    );
  }

  public function __toString(): string
  {
    return "{$this->hit_points},{$this->damage},{$this->armor}";
  }
}
