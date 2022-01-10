<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Effect;

use Bake\AdventOfCode2015\Day22\Entity;

class ConstantDamage implements Effect
{
  private int $turn = 0;

  public function __construct(
    private int $damage,
  ) {
  }

  public function tick(Entity $target): bool
  {
    if ($this->turn === 0) {
      $target->takeDamage($this->damage);
    }
    $this->turn += 1;
    $this->turn %= 2;
    return true;
  }

  public function __toString(): string
  {
    return 'Constant Damage';
  }
}
