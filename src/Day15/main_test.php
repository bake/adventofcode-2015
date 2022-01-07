<?php

namespace Bake\AdventOfCode2015\Day15;

require __DIR__ . '/main.php';

test('day 15 part 1 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8
  Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3
  PLAIN);
  $ingredients = [...input($handle)];
  expect(part1($ingredients))->toBe(62842880);
  expect(part2($ingredients))->toBe(57600000);
})->group('day15', 'sample');

test('day 15 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $ingredients = [...input($handle)];
  expect(part1($ingredients))->toBe(222870);
  expect(part2($ingredients))->toBe(117936);
})->group('day15', 'input');
