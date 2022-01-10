<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day22;

require __DIR__ . '/main.php';

test('day 22 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $boss = input($handle);
  expect(part1($boss))->toBe(953);
  expect(part2($boss))->toBe(1289);
})->group('day22', 'input');
