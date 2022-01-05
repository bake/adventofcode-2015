<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day13;

function input($handle): array
{
  $happiness = [];
  while ($line = fgets($handle)) {
    $line = rtrim($line, "\n.");
    [$src, $dir, $num, $dst] = sscanf($line, '%s would %s %d happiness units by sitting next to %s');
    // yield [$src, $dst, match ($dir) {
    //   'gain' => $num,
    //   'lose' => -$num,
    // }];
    $happiness[$src][$dst] = match ($dir) {
      'gain' => $num,
      'lose' => -$num,
    };
  }
  return $happiness;
}

function permutations(array $array): iterable
{
  if (count($array) === 1) {
    yield $array;
    return;
  }
  foreach ($array as $value) {
    foreach (permutations(array_diff($array, [$value])) as $perm) {
      yield [$value, ...$perm];
    }
  }
}

function part1(array $happiness): int
{
  $max = 0;
  foreach (permutations(array_keys($happiness)) as $perm) {
    [$srcs, $dsts] = [$perm, [...array_slice($perm, 1), $perm[0]]];
    $perm = array_map(function ($src, $dst) use ($happiness): int {
      return $happiness[$src][$dst] + $happiness[$dst][$src] ?? 0;
    }, $srcs, $dsts);
    $max = max(array_sum($perm), $max);
  }
  return $max;
}

function part2(array $happiness): int
{
  $happiness = array_map(fn (array $guest): array => [...$guest, 'Me' => 0], $happiness);
  $happiness['Me'] = array_combine(array_keys($happiness), array_fill(0, count($happiness), 0));
  return part1($happiness);
}
