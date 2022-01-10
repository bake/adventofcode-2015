<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Action;

use Bake\AdventOfCode2015\Day22\Effect\Poison as EffectPoison;
use Bake\AdventOfCode2015\Day22\Entity;

class Poison implements Action
{
  private const mana = 173;
  private const cooldown = 6;

  private int $cooldown = 0;

  public function execute(Entity $src, Entity $dst): void
  {
    $this->cooldown = self::cooldown;
    $src->mana(-self::mana);
    $dst->addEffect(new EffectPoison(self::cooldown));
  }

  public function tick(): void
  {
    $this->cooldown = max(0, $this->cooldown - 1);
  }

  public function available(Entity $entity): bool
  {
    return $this->cooldown === 0 && $entity->mana >= self::mana;
  }

  public function __toString(): string
  {
    return 'Poison';
  }
}
