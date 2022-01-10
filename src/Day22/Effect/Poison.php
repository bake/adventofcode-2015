<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Effect;

use Bake\AdventOfCode2015\Day22\Entity;

class Poison implements Effect
{
  private int $damage = 3;

  public function __construct(
    private int $turns,
  ) {
  }

  public function tick(Entity $target): bool
  {
    $target->takeDamage($this->damage);
    return --$this->turns > 0;
  }

  public function __toString(): string
  {
    return 'Poison';
  }
}
