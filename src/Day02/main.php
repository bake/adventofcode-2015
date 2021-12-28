<?php

namespace Bake\AdventOfCode2015\Day02;

function input($handle): iterable
{
  while ([$l, $w, $h] = fscanf($handle, '%dx%dx%d')) {
    yield [$l, $w, $h];
  }
}

function part1(array $presents): int
{
  return array_sum(array_map(function (array $present): int {
    [$l, $w, $h] = $present;
    $sides = [$l * $w,  $w * $h,  $h * $l];
    return 2 * array_sum($sides) + min($sides);
  }, $presents));
}

function part2(array $presents): int
{
  return array_sum(array_map(function (array $present): int {
    sort($present);
    [$a, $b, $c] = $present;
    return 2 * $a + 2 * $b + $a * $b * $c;
  }, $presents));
}
