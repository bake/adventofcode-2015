<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day24;

require __DIR__ . '/main.php';

test('day 24 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  1
  2
  3
  4
  5
  7
  8
  9
  10
  11
  PLAIN);
  $packages = input($handle);
  expect(part1($packages))->toBe(99);
  expect(part2($packages))->toBe(44);
})->group('day24', 'sample');

test('day 24 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $packages = input($handle);
  expect(part1($packages))->toBe(10439961859);
  expect(part2($packages))->toBe(72050269);
})->group('day24', 'input');
