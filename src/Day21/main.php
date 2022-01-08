<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day21;

function input($handle): Entity
{
  $props = explode(PHP_EOL, trim(stream_get_contents($handle)));
  $props = array_map(
    fn (string $p): int => (int) filter_var($p, FILTER_SANITIZE_NUMBER_INT),
    $props,
  );
  return new Entity('Boss', ...$props);
}

/** @return iterable<Entity> */
function players(): iterable
{
  $weapons = [
    new Item('Dagger', 8, 4, 0),
    new Item('Shortsword', 10, 5, 0),
    new Item('Warhammer', 25, 6, 0),
    new Item('Longsword', 40, 7, 0),
    new Item('Greataxe', 74, 8, 0),
  ];
  $armaments = [
    new Item('None', 0, 0, 0),
    new Item('Pleather', 13, 0, 1),
    new Item('Chainmail', 31, 0, 2),
    new Item('Splintmail', 53, 0, 3),
    new Item('Bandedmail', 75, 0, 4),
    new Item('Platemail', 102, 0, 5),
  ];
  $rings = [
    new Item('None', 0, 0, 0),
    new Item('None', 0, 0, 0),
    new Item('Damage +1', 25, 1, 0),
    new Item('Damage +2', 50, 2, 0),
    new Item('Damage +3', 100, 3, 0),
    new Item('Defense +1', 20, 0, 1),
    new Item('Defense +2', 40, 0, 2),
    new Item('Defense +3', 80, 0, 3),
  ];
  foreach ($weapons as $w) {
    foreach ($armaments as $a) {
      foreach ($rings as $r1) {
        foreach ($rings as $r2) {
          if ($r1 === $r2) continue;
          $price = $w->price + $a->price + $r1->price + $r2->price;
          yield $price => new Entity(
            'Player',
            100,
            $w->damage + $a->damage + $r1->damage + $r2->damage,
            $w->armor + $a->armor + $r1->armor + $r2->armor,
          );
        }
      }
    }
  }
}

// Simulate a fight and return true if the first entity wins, false otherwise.
function fight(Entity $a, Entity $b): bool
{
  static $cache;
  if (isset($cache["{$a},{$b}"])) return $cache["{$a},{$b}"];
  $entities = [$a, $b];
  for ($turn = 0; min(array_column($entities, 'hit_points')) > 0; $turn++) {
    $i = $turn % count($entities);
    $j = ($turn + 1) % count($entities);
    $entities[$j] = $entities[$j]->takeDamage($entities[$i]->damage);
  }
  $entities = array_filter($entities, fn ($e) => $e->hit_points > 0);
  return $cache["{$a},{$b}"] = !key($entities);
}

function part1(Entity $boss): int
{
  $cost = PHP_INT_MAX;
  foreach (players() as $c => $player) {
    if (fight($player, $boss)) {
      $cost = min($cost, $c);
    }
  }
  return $cost;
}

function part2(Entity $boss): int
{
  $cost = PHP_INT_MIN;
  foreach (players() as $c => $player) {
    if (!fight($player, $boss)) {
      $cost = max($cost, $c);
    }
  }
  return $cost;
}
