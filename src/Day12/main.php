<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day12;

function input($handle): array
{
  return json_decode(stream_get_contents($handle));
}

function part1(array|object $data): int
{
  $raw = json_encode($data);
  preg_match_all('/\-?\d+/', $raw, $nums);
  $nums = array_map(intval(...), $nums[0]);
  return array_sum($nums);
}

function part2($data): int
{
  return match (gettype($data)) {
    'integer' => (int) $data,
    'array' => array_sum(array_map(__FUNCTION__, $data)),
    'object' => (function () use ($data): int {
      $data = array_values((array) $data);
      if (in_array('red', $data)) return 0;
      return part2($data);
    })(),
    default => 0,
  };
}
