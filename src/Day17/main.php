<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day17;

/** @return int[] */
function input($handle): array
{
  $containers = explode(PHP_EOL, stream_get_contents($handle));
  $containers = array_filter($containers);
  $containers = array_map(intval(...), $containers);
  rsort($containers);
  return $containers;
}

/** @param int[] */
function part1(array $containers, int $liters = 150): int
{
  if ($liters < 0) return 0;
  if ($liters === 0) return 1;
  $sum = 0;
  while ($container = array_shift($containers)) {
    $sum += part1($containers, $liters - $container);
  }
  return $sum;
}

function combinations(array $containers, int $liters, $num = 0)
{
  if ($liters < 0) return yield 0;
  if ($liters === 0) return yield $num;
  while ($container = array_shift($containers)) {
    yield from combinations($containers, $liters - $container, $num + 1);
  }
}

/** @param int[] */
function part2(array $containers, int $liters = 150): int
{
  $combinations = [...combinations($containers, $liters)];
  $combinations = array_filter($combinations);
  $combinations = array_count_values($combinations);
  ksort($combinations);
  return reset($combinations);
}
