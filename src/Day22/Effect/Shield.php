<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Effect;

use Bake\AdventOfCode2015\Day22\Entity;

class Shield implements Effect
{
  private int $armor = 7;
  private readonly int $turns_total;

  public function __construct(
    private int $turns,
  ) {
    $this->turns_total = $turns;
  }

  public function tick(Entity $target): bool
  {
    if ($this->turns === $this->turns_total) $target->armor += $this->armor;
    $this->turns--;
    if ($this->turns === 0) $target->armor -= $this->armor;
    return $this->turns > 0;
  }

  public function __toString(): string
  {
    return 'Shield';
  }
}
