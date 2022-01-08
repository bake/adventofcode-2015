<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day21;

class Item
{
  public function __construct(
    public readonly string $name,
    public readonly int $price,
    public readonly int $damage,
    public readonly int $armor,
  ) {
  }
}
