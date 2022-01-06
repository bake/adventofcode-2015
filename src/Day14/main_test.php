<?php

namespace Bake\AdventOfCode2015\Day14;

require __DIR__ . '/main.php';

test('day 14 part 1 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
  Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.
  PLAIN);
  $reindeers = [...input($handle)];
  expect(part1($reindeers, 1000))->toBe(1120);
  expect(part2($reindeers, 1000))->toBe(689);
})->group('day14', 'sample');

test('day 14 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $reindeers = [...input($handle)];
  expect(part1($reindeers))->toBe(2660);
  expect(part2($reindeers))->toBe(1256);
})->group('day14', 'input');
