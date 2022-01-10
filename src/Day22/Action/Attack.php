<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Action;

use Bake\AdventOfCode2015\Day22\Entity;

class Attack implements Action
{
  public function __construct(
    public readonly int $damage,
  ) {
  }

  public function execute(Entity $src, Entity $dst): void
  {
    $dst->takeDamage($this->damage);
  }

  public function available(Entity $entity): bool
  {
    return true;
  }

  public function tick(): void
  {
  }

  public function __toString(): string
  {
    return 'Attack';
  }
}
