<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day18;

require __DIR__ . '/main.php';

test('day 18 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  .#.#.#
  ...##.
  #....#
  ..#...
  #.#..#
  ####..
  PLAIN);
  $grid = input($handle);
  expect(part1($grid, 4))->toBe(4);
  expect(part2($grid, 5))->toBe(17);
})->group('day18', 'sample');

test('day 18 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $grid = input($handle);
  expect(part1($grid))->toBe(1061);
  expect(part2($grid))->toBe(1006);
})->group('day18', 'input');
