<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day11;

function input($handle): string
{
  return trim(stream_get_contents($handle));
}

function password_next(string $password): string
{
  $num = (int) base_convert($password, 36, 10) + 1;
  $password = base_convert((string) $num, 10, 36);
  $password = str_replace('0', 'a', $password);
  return $password;
}

function increasing(string $password): bool
{
  for ($i = 0; $i < strlen($password) - 2; $i++) {
    [$a, $b, $c] = [$password[$i], $password[$i + 1], $password[$i + 2]];
    if (ord($a) === ord($b) - 1 && ord($b) === ord($c) - 1) {
      return true;
    }
  }
  return false;
}

function confusing(string $password): bool
{
  return
    str_contains($password, 'i') ||
    str_contains($password, 'o') ||
    str_contains($password, 'l');
}

function pairs(string $password): bool
{
  preg_match_all('/([a-z])\1+/', $password, $pairs);
  $pairs = array_count_values($pairs[0]);
  return count($pairs) >= 2;
}

function part1(string $password): string
{
  while (true) {
    $password = password_next($password);
    if (!increasing($password)) continue;
    if (confusing($password)) continue;
    if (!pairs($password)) continue;
    return $password;
  }
}

function part2(string $password): string
{
  return part1(part1($password));
}
