<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Action;

use Bake\AdventOfCode2015\Day22\Entity;

class MagicMissile implements Action
{
  private const mana = 53;
  private const damage = 4;

  public function execute(Entity $src, Entity $dst): void
  {
    $src->mana(-self::mana);
    $dst->takeDamage(self::damage);
  }

  public function available(Entity $entity): bool
  {
    return $entity->mana >= self::mana;
  }

  public function tick(): void
  {
  }

  public function __toString(): string
  {
    return 'Magic Missile';
  }
}
