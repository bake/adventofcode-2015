<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day25;

require __DIR__ . '/main.php';

test('day 25 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  [$row, $col] = input($handle);
  expect(part1($row, $col))->toBe(8997277);
})->group('day25', 'input');
