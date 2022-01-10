<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Action;

use Bake\AdventOfCode2015\Day22\Entity;
use Stringable;

interface Action extends Stringable
{
  public function execute(Entity $src, Entity $dst): void;
  public function available(Entity $entity): bool;
  public function tick(): void;
}
