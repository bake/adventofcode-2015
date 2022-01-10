<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Effect;

use Bake\AdventOfCode2015\Day22\Entity;

class Recharge implements Effect
{
  private int $mana = 101;

  public function __construct(
    private int $turns,
  ) {
  }

  public function tick(Entity $target): bool
  {
    $target->mana($this->mana);
    return --$this->turns > 0;
  }

  public function __toString(): string
  {
    return 'Eecharge';
  }
}
