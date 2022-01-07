<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day18;

class Point
{
  public function __construct(
    public readonly int $x,
    public readonly int $y,
  ) {
  }
}
