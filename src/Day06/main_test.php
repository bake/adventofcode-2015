<?php

namespace Bake\AdventOfCode2015\Day06;

require __DIR__ . '/main.php';

test('day 6 input', function (): void {
  $handle = fopen('src/Day06/input.txt', 'r');
  $instructions = [...input($handle)];
  expect(part1($instructions))->toBe(569999);
  expect(part2($instructions))->toBe(17836115);
})->group('day06', 'input');
