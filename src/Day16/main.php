<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day16;

/** @return iterable<int,Array<string,int>> */
function input($handle): iterable
{
  while ($line = fgets($handle)) {
    $line = str_replace(' ', '', $line);
    [$id, $traits] = explode(':', $line, 2);
    $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $traits = explode(',', $traits);
    $traits = array_map(fn ($t) => explode(':', $t, 2), $traits);
    $traits = array_combine(
      array_column($traits, 0),
      array_map(intval(...), array_column($traits, 1)),
    );
    yield $id => $traits;
  }
}

/** @param Array<int,Array<string,int>> */
function part1(array $sues): int
{
  $compounds = [
    'children' => 3,
    'cats' => 7,
    'samoyeds' => 2,
    'pomeranians' => 3,
    'akitas' => 0,
    'vizslas' => 0,
    'goldfish' => 5,
    'trees' => 3,
    'cars' => 2,
    'perfumes' => 1,
  ];
  $sues = array_filter($sues, function (array $sue) use ($compounds): bool {
    foreach ($compounds as $key => $value) {
      if (isset($sue[$key]) && $sue[$key] !== $value) {
        return false;
      }
    }
    return true;
  });
  $sues = array_keys($sues);
  return reset($sues);
}

/** @param Array<int,Array<string,int>> */
function part2(array $sues): int
{
  $compounds = [
    'children' => fn (int $num): bool => $num === 3,
    'cats' => fn (int $num): bool => $num > 7,
    'samoyeds' => fn (int $num): bool => $num === 2,
    'pomeranians' => fn (int $num): bool => $num < 3,
    'akitas' => fn (int $num): bool => $num === 0,
    'vizslas' => fn (int $num): bool => $num === 0,
    'goldfish' => fn (int $num): bool => $num < 5,
    'trees' => fn (int $num): bool => $num > 3,
    'cars' => fn (int $num): bool => $num === 2,
    'perfumes' => fn (int $num): bool => $num === 1,
  ];
  $sues = array_filter($sues, function (array $sue) use ($compounds): bool {
    foreach ($compounds as $key => $value) {
      if (isset($sue[$key]) && !$value($sue[$key])) {
        return false;
      }
    }
    return true;
  });
  $sues = array_keys($sues);
  return reset($sues);
}
