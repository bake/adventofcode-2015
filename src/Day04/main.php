<?php

namespace Bake\AdventOfCode2015\Day04;

function input($handle): string
{
  return trim(stream_get_contents($handle));
}

function part1(string $key): int
{
  $hash = '';
  for ($i = 1; substr($hash, 0, 5) !== '00000'; $i++) {
    $hash = md5("{$key}{$i}");
  }
  return $i - 1;
}

function part2(string $key): int
{
  $hash = '';
  for ($i = 1; substr($hash, 0, 6) !== '000000'; $i++) {
    $hash = md5("{$key}{$i}");
  }
  return $i - 1;
}
