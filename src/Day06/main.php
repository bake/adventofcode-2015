<?php

namespace Bake\AdventOfCode2015\Day06;

function input($handle): iterable
{
  while ($row = fgets($handle)) {
    if (!preg_match('/(\w+) (\d+),(\d+) through (\d+),(\d+)/', $row, $vals)) {
      continue;
    }
    yield array_slice($vals, 1);
  }
}

function part1(array $instructions): int
{
  $grid = array_fill(0, 1000, array_fill(0, 1000, false));
  foreach ($instructions as [$command, $min_x, $min_y, $max_x, $max_y]) {
    for ($y = $min_y; $y <= $max_y; $y++) {
      for ($x = $min_x; $x <= $max_x; $x++) {
        $grid[$y][$x] = match ($command) {
          'on' => true,
          'off' => false,
          'toggle' => !$grid[$y][$x],
        };
      }
    }
  }
  return array_sum(array_map(array_sum(...), $grid));
}

function part2(array $instructions): int
{
  $grid = array_fill(0, 1000, array_fill(0, 1000, 0));
  foreach ($instructions as [$command, $min_x, $min_y, $max_x, $max_y]) {
    for ($y = $min_y; $y <= $max_y; $y++) {
      for ($x = $min_x; $x <= $max_x; $x++) {
        $grid[$y][$x] += match ($command) {
          'on' => 1,
          'off' => -1,
          'toggle' => +2,
        };
        $grid[$y][$x] = max(0, $grid[$y][$x]);
      }
    }
  }
  return array_sum(array_map(array_sum(...), $grid));
}
