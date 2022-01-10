<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Effect;

use Bake\AdventOfCode2015\Day22\Entity;
use Stringable;

interface Effect extends Stringable
{
  public function tick(Entity $target): bool;
}
