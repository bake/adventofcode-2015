<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22;

use Bake\AdventOfCode2015\Day22\Action\Actions;
use Bake\AdventOfCode2015\Day22\Effect\Effect;
use Bake\AdventOfCode2015\Day22\Effect\Effects;

class Entity
{
  public function __construct(
    public readonly string $name,
    public int $hit_points,
    public int $mana,
    public int $armor,
    public Actions $actions,
    public Effects $effects,
  ) {
  }

  public function takeDamage(int $hit_points): void
  {
    $this->hit_points -= max($hit_points - $this->armor, 1);
  }

  public function action(string $name, Entity $target): bool
  {
    $action = $this->actions->get($name);
    if (!$action?->available($this)) return false;
    $action->execute($this, $target);
    return true;
  }

  public function actions(): array
  {
    return $this->actions->available($this);
  }

  public function addEffect(Effect $effect): bool
  {
    return $this->effects->add($effect);
  }

  public int $mana_spent = 0;
  public int $mana_recharged = 0;

  public function mana(int $mana): void
  {
    if ($mana < 0) $this->mana_spent -= $mana;
    if ($mana > 0) $this->mana_recharged += $mana;
    $this->mana += $mana;
  }

  public function tick(): void
  {
    $this->actions->tick();
    $this->effects->tick($this);
  }

  public function __toString(): string
  {
    return $this->name;
  }

  public function __clone()
  {
    $this->effects = clone $this->effects;
    $this->actions = clone $this->actions;
  }
}
