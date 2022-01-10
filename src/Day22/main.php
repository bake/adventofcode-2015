<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22;

use Bake\AdventOfCode2015\Day22\Action\Actions;
use Bake\AdventOfCode2015\Day22\Action\Attack;
use Bake\AdventOfCode2015\Day22\Action\Drain;
use Bake\AdventOfCode2015\Day22\Action\MagicMissile;
use Bake\AdventOfCode2015\Day22\Action\Poison;
use Bake\AdventOfCode2015\Day22\Action\Recharge;
use Bake\AdventOfCode2015\Day22\Action\Shield;
use Bake\AdventOfCode2015\Day22\Effect\ConstantDamage;
use Bake\AdventOfCode2015\Day22\Effect\Effects;

function input($handle): Entity
{
  $props = explode(PHP_EOL, trim(stream_get_contents($handle)));
  [$hit_points, $damage] = array_map(
    fn (string $p): int => (int) filter_var($p, FILTER_SANITIZE_NUMBER_INT),
    $props,
  );
  return new Entity(
    name: 'Boss',
    mana: 0,
    armor: 0,
    hit_points: (int) $hit_points,
    actions: new Actions(new Attack((int) $damage)),
    effects: new Effects,
  );
}

function all_fights(Entity $player, Entity $boss): int
{
  $fight = function (
    Entity $player,
    Entity $boss,
    bool $player_turn = true,
  ) use (&$fight): int {
    static $mana_spent = PHP_INT_MAX;

    $player->tick();
    $boss->tick();

    if ($player->hit_points <= 0) return PHP_INT_MAX;
    if ($player->mana <= 0) return PHP_INT_MAX;
    if ($player->mana_spent >= $mana_spent) return PHP_INT_MAX;
    if ($boss->hit_points <= 0) return $player->mana_spent;

    if (!$player_turn) {
      $boss->action(Attack::class, $player);
      return $fight($player, $boss, true);
    }

    foreach ($player->actions() as $action) {
      [$player2, $boss2] = [clone $player, clone $boss];
      $player2->action($action, $boss2);
      $mana_spent = min($mana_spent, $fight($player2, $boss2, false));
    }
    return $mana_spent;
  };
  return $fight($player, $boss);
}

function part1(Entity $boss): int
{
  $player = new Entity(
    name: 'Player',
    hit_points: 50,
    mana: 500,
    armor: 0,
    actions: new Actions(
      new MagicMissile,
      new Drain,
      new Shield,
      new Poison,
      new Recharge,
    ),
    effects: new Effects,
  );
  return all_fights($player, $boss);
}

function part2(Entity $boss): int
{
  $player = new Entity(
    name: 'Player',
    hit_points: 50,
    mana: 500,
    armor: 0,
    actions: new Actions(
      new MagicMissile,
      new Drain,
      new Shield,
      new Poison,
      new Recharge,
    ),
    effects: new Effects(
      new ConstantDamage(1),
    ),
  );
  return all_fights($player, $boss);
}
