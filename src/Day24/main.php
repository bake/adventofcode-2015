<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day24;

function input($handle): array
{
  $packages = explode(PHP_EOL, stream_get_contents($handle));
  $packages = array_filter($packages);
  $packages = array_map(intval(...), $packages);
  return $packages;
}

// This is pretty slow.
function permutations(array $array): iterable
{
  if (count($array) === 1) return yield $array;
  foreach ($array as $i => $value) {
    $new = array_splice($array, $i, 1);
    foreach (permutations($new) as $perm) {
      yield [$value, ...$perm];
    }
  }
}

// And this only works most of the time.
function permutations_shuffle(array $array, int $n): iterable
{
  for ($i = 0; $i < $n; $i++) {
    shuffle($array);
    yield $array;
  }
}

function combinations(array $packages, int $num_groups): iterable
{
  $group_size = array_sum($packages) / $num_groups;
  foreach (permutations_shuffle($packages, 10_000_000) as $perm) {
    $size = 0;
    $group = 0;
    $groups = [[]];
    foreach ($perm as $package) {
      $size += $package;
      $groups[$group][] = $package;
      if ($size === $group_size) {
        $size = 0;
        $group++;
        $groups[] = [];
      }
      if ($size > $group_size) {
        continue 2;
      }
    }
    yield array_filter($groups, count(...));
  }
}

/** @param int[] */
function part1(array $packages): int
{
  $qes = [];
  foreach (combinations($packages, 3) as $groups) {
    foreach ($groups as $group) {
      $size = count($group);
      $qes[$size] ??= INF;
      $qes[$size] = min($qes[$size], array_product($group));
    }
  }
  ksort($qes);
  return reset($qes);
}

/** @param int[] */
function part2(array $packages): int
{
  $qes = [];
  foreach (combinations($packages, 4) as $groups) {
    foreach ($groups as $group) {
      $size = count($group);
      $qes[$size] ??= INF;
      $qes[$size] = min($qes[$size], array_product($group));
    }
  }
  ksort($qes);
  return reset($qes);
}
