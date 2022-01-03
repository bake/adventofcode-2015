<?php

namespace Bake\AdventOfCode2015\Day08;

require __DIR__ . '/main.php';

test('day 8 part 1 sample', function (): void {
  $handle = string_to_stream(<<<'PLAIN'
  ""
  "abc"
  "aaa\"aaa"
  "\x27"
  PLAIN);
  $strings = input($handle);
  expect(part1($strings))->toBe(12);
  expect(part2($strings))->toBe(19);
})->group('day08', 'sample');

test('day 8 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $strings = [...input($handle)];
  expect(part1($strings))->toBe(1342);
  expect(part2($strings))->toBe(2074);
})->group('day08', 'input');
