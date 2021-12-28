<?php

namespace Bake\AdventOfCode2015\Day03;

function input($handle): array
{
  return str_split(trim(stream_get_contents($handle)));
}

function part1(array $moves): int
{
  $location = [0, 0];
  $locations = [implode(',', $location) => 1];
  while ($move = array_shift($moves)) {
    [$x, $y] = $location;
    $location = match ($move) {
      '^' => [$x, $y - 1],
      '>' => [$x + 1, $y],
      'v' => [$x, $y + 1],
      '<' => [$x - 1, $y],
    };
    $locations[implode(',', $location)] ??= 0;
    $locations[implode(',', $location)]++;
  }
  return count($locations);
}

function part2(array $moves): int
{
  $santa = 0;
  $santas = [[0, 0], [0, 0]];
  $locations = [
    implode(',', $santas[0]) => 1,
    implode(',', $santas[1]) => 1,
  ];
  while ($move = array_shift($moves)) {
    $santa = ++$santa % count($santas);
    [$x, $y] = $santas[$santa];
    $santas[$santa] = match ($move) {
      '^' => [$x, $y - 1],
      '>' => [$x + 1, $y],
      'v' => [$x, $y + 1],
      '<' => [$x - 1, $y],
    };
    $locations[implode(',', $santas[$santa])] ??= 0;
    $locations[implode(',', $santas[$santa])]++;
  }
  return count($locations);
}
