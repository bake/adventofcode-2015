<?php

namespace Bake\AdventOfCode2015\Day05;

function input($handle): array
{
  return explode(PHP_EOL, trim(stream_get_contents($handle)));
}

function part1(array $strings): int
{
  return count(array_filter($strings, nice1(...)));
}

function nice1(string $string): bool
{
  return array_sum([
    preg_match_all('/[aeiou]/', $string) < 3,
    preg_match('/(.)\1/', $string) < 1,
    preg_match('/(ab|cd|pq|xy)/', $string) > 0,
  ]) === 0;
}

function part2(array $strings): int
{
  return count(array_filter($strings, nice2(...)));
}

function nice2(string $string): bool
{
  return array_sum([
    preg_match('/(.{2}).*\1/', $string) === 0,
    preg_match('/(.).\1/', $string) === 0,
  ]) === 0;
}
