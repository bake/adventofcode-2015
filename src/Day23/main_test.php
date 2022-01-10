<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day23;

require __DIR__ . '/main.php';

test('day 23 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  inc b
  jio b, +2
  tpl b
  inc b  
  PLAIN);
  $instructions = input($handle);
  expect(part1($instructions))->toBe(2);
})->group('day23', 'sample');

test('day 23 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $instructions = input($handle);
  expect(part1($instructions))->toBe(170);
  expect(part2($instructions))->toBe(247);
})->group('day23', 'input');
