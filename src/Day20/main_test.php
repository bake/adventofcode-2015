<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day20;

require __DIR__ . '/main.php';

test('day 20 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $number = input($handle);
  expect(part1($number))->toBe(776160);
  expect(part2($number))->toBe(786240);
})->group('day20', 'input');
