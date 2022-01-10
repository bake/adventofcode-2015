<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Action;

use Bake\AdventOfCode2015\Day22\Entity;

class Drain implements Action
{
  private const mana = 73;
  private const hit_points = 2;
  private const damage = 2;

  public function execute(Entity $src, Entity $dst): void
  {
    $src->mana(-self::mana);
    $src->hit_points += self::hit_points;
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
    return 'Drain';
  }
}
