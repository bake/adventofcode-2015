<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Effect;

use Bake\AdventOfCode2015\Day22\Entity;

class Effects
{
  /** @param Array<String,Effect> */
  public array $effects;

  public function __construct(Effect ...$effects)
  {
    $this->effects = array_combine(
      array_map(get_class(...), $effects),
      $effects,
    );
  }

  public function add(Effect $effect): bool
  {
    if (isset($this->effects[get_class($effect)])) return false;
    $this->effects[get_class($effect)] = $effect;
    return true;
  }

  public function tick(Entity $target): void
  {
    foreach ($this->effects as $name => $effect) {
      if (!$effect->tick($target)) {
        unset($this->effects[$name]);
      }
    }
  }

  public function __clone()
  {
    foreach ($this->effects as $name => $effect) {
      $this->effects[$name] = clone $effect;
    }
  }
}
