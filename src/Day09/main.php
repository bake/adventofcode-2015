<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day09;

function input($handle): array
{
  $distances = [];
  while ([$src, $dst, $dist] = fscanf($handle, '%s to %s = %d')) {
    $distances[$src][$dst] = $dist;
    $distances[$dst][$src] = $dist;
  }
  return $distances;
}

function permutations(array $array): array
{
  if (count($array) === 1) {
    return [$array];
  }
  $permutations = [];
  foreach ($array as $value) {
    foreach (permutations(array_diff($array, [$value])) as $perm) {
      $permutations[] = [$value, ...$perm];
    }
  }
  return $permutations;
}

function distances(array $dists): array
{
  $perms = permutations(array_keys($dists));
  $perms = array_map(function ($perm) use ($dists) {
    [$srcs, $dsts] = [$perm, array_slice($perm, 1)];
    return array_map(fn ($src, $dst) => $dists[$src][$dst] ?? 0, $srcs, $dsts);
  }, $perms);
  $perms = array_map(array_sum(...), $perms);
  return $perms;
}

function part1(array $dists): int
{
  return min(distances($dists));
}

function part2(array $dists): int
{
  return max(distances($dists));
}
