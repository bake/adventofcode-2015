<?php

namespace Bake\AdventOfCode2015\Day17;

require __DIR__ . '/main.php';

test('day 17 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  20
  15
  10
  5
  5
  PLAIN);
  $containers = input($handle);
  expect(part1($containers, 25))->toBe(4);
  expect(part2($containers, 25))->toBe(3);
})->group('day17', 'input');

test('day 17 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $containers = input($handle);
  expect(part1($containers))->toBe(1638);
  expect(part2($containers))->toBe(17);
})->group('day17', 'input');
