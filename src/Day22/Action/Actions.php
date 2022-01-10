<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22\Action;

use Bake\AdventOfCode2015\Day22\Entity;

class Actions
{
  /** @param Array<String,Action> */
  public array $actions;

  public function __construct(Action ...$actions)
  {
    $this->actions = array_combine(
      array_map(get_class(...), $actions),
      $actions,
    );
  }

  public function get(string $name): ?Action
  {
    return $this->actions[$name] ?? null;
  }

  public function available(Entity $entity): array
  {
    $actions = [];
    foreach ($this->actions as $name => $action) {
      if ($action->available($entity)) {
        $actions[] = $name;
      }
    }
    return $actions;
  }

  public function tick(): void
  {
    foreach ($this->actions as $action) {
      $action->tick();
    }
  }

  public function __clone()
  {
    foreach ($this->actions as $name => $action) {
      $this->actions[$name] = clone $action;
    }
  }
}
