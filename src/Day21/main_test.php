<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day21;

require __DIR__ . '/main.php';

test('day 21 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $boss = input($handle);
  expect(part1($boss))->toBe(121);
  expect(part2($boss))->toBe(201);
})->group('day21', 'input');
