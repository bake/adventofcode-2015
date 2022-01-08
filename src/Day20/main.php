<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day20;

function input($handle): int
{
  return (int) stream_get_contents($handle);
}

function part1(int $number): int
{
  $number /= 10;
  $houses = array_fill(1, $number / 2, 0);
  for ($i = 1; $i < $number / 2; $i++) {
    for ($j = $i; $j < $number / 2; $j += $i) {
      $houses[$j] += $i;
    }
  }
  foreach ($houses as $house => $num) {
    if ($num >= $number) {
      return $house;
    }
  }
  return 0;
}

// This takes about 1.3s and fits in PHPs default memory limit of 128MB.
function part2(int $number): int
{
  $number /= 10;
  $houses = array_fill(1, $number / 2, 0);
  for ($i = 1; $i < $number / 2; $i++) {
    for ($j = $i; $j < $number / 2 && $j <= $i * 50; $j += $i) {
      $houses[$j] += $i;
    }
  }
  foreach ($houses as $house => $num) {
    if ($num * 11 >= $number * 10) {
      return $house;
    }
  }
  return 0;
}
