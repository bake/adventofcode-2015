<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day07;

function input($handle): iterable
{
  while ($line = fgets($handle)) {
    [$input, $output] = explode(' -> ', trim($line));
    yield $output => $input;
  }
}

function execute(string $wire, array $ins, array &$cache = []): int
{
  if (isset($cache[$wire])) return $cache[$wire];
  return $cache[$wire] = match (true) {
    (bool) preg_match('/^(\d+)$/', $wire, $vals) => (int) $vals[1],
    (bool) preg_match('/^(\w+)$/', $wire, $vals) => execute($ins[$vals[1]], $ins, $cache),
    (bool) preg_match('/^(\w+) AND (\w+)$/', $wire, $vals) => execute($vals[1], $ins, $cache) & execute($vals[2], $ins, $cache),
    (bool) preg_match('/^(\w+) OR (\w+)$/', $wire, $vals) => execute($vals[1], $ins, $cache) | execute($vals[2], $ins, $cache),
    (bool) preg_match('/^(\w+) LSHIFT (\w+)$/', $wire, $vals) => execute($vals[1], $ins, $cache) << execute($vals[2], $ins, $cache),
    (bool) preg_match('/^(\w+) RSHIFT (\w+)$/', $wire, $vals) => execute($vals[1], $ins, $cache) >> execute($vals[2], $ins, $cache),
    (bool) preg_match('/^NOT (\w+)$/', $wire, $vals) => ~execute($vals[1], $ins, $cache) & 0xffff,
  };
}

function part1(array $instructions): int
{
  return execute('a', $instructions);
}

function part2(array $instructions): int
{
  $instructions['b'] = (string) execute('a', $instructions);
  return execute('a', $instructions);
}
