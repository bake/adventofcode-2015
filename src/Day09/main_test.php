<?php

namespace Bake\AdventOfCode2015\Day09;

require __DIR__ . '/main.php';

test('day 9 sample', function (): void {
  $handle = string_to_stream(<<<'PLAIN'
  London to Dublin = 464
  London to Belfast = 518
  Dublin to Belfast = 141
  PLAIN);
  $distances = input($handle);
  expect(part1($distances))->toBe(605);
  expect(part2($distances))->toBe(982);
})->group('day09', 'sample');

test('day 9 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $distances = [...input($handle)];
  expect(part1($distances))->toBe(117);
  expect(part2($distances))->toBe(909);
})->group('day09', 'input');
