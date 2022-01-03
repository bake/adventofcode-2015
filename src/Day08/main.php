<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day08;

function input($handle): array
{
  $strings = explode(PHP_EOL, stream_get_contents($handle));
  $strings = array_map(trim(...), $strings);
  $strings = array_filter($strings);
  return $strings;
}

function part1(array $strings): int
{
  $results = $strings;
  $results = array_map(fn ($string): string => trim($string, '"'), $results);
  $results = str_replace('\\\\', '-', $results);
  $results = str_replace('\"', '"', $results);
  $results = preg_replace('/\\\x[0-9a-f]{2}/', '-', $results);
  return
    array_sum(array_map(strlen(...), $strings)) -
    array_sum(array_map(strlen(...), $results));
}

function part2(array $strings): int
{
  $results = $strings;
  $results = str_replace('\\', '\\\\', $results);
  $results = str_replace('"', '\"', $results);
  $results = array_map(fn ($string): string => "\"$string\"", $results);
  return
    array_sum(array_map(strlen(...), $results)) -
    array_sum(array_map(strlen(...), $strings));
}
