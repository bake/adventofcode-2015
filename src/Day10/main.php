<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day10;

function input($handle): string
{
  return trim(stream_get_contents($handle));
}

function look_and_say(string $word): string
{
  for ($i = 0, $num = 1, $str = ''; $i < strlen($word) - 1; $i++, $num++) {
    [$curr, $next] = [$word[$i], $word[$i + 1]];
    if ($curr === $next) continue;
    $str .= $num . $curr;
    $num = 0;
  }
  return $str . $num . $word[strlen($word) - 1];
}

function part1(string $word): int
{
  for ($i = 0; $i < 40; $i++) {
    $word = look_and_say($word);
  }
  return strlen($word);
}

function part2(string $word): int
{
  for ($i = 0; $i < 50; $i++) {
    $word = look_and_say($word);
  }
  return strlen($word);
}
