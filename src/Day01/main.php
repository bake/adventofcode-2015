<?php

namespace Bake\AdventOfCode2015\Day01;

function input($handle): array
{
  return str_split(trim(stream_get_contents($handle)));
}

function part1(array $instructions): int
{
  return array_reduce($instructions, fn (int $i, string $ins): int => match ($ins) {
    '(' => $i + 1,
    ')' => $i - 1,
  }, 0);
}

function part2(array $instructions): int
{
  for ($i = 0, $floor = 0; $floor >= 0; $i++) {
    $floor += match (array_shift($instructions)) {
      '(' => 1,
      ')' => -1,
    };
  }
  return $i;
}
