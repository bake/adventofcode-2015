<?php

namespace Bake\AdventOfCode2015\Day02;

require __DIR__ . '/main.php';

test('day 2 part 1 2x3x4', function (): void {
  $presents = [...input(string_to_stream('2x3x4'))];
  expect(part1($presents))->toBe(58);
})->group('day02', 'sample');

test('day 2 part 1 1x1x10', function (): void {
  $presents = [...input(string_to_stream('1x1x10'))];
  expect(part1($presents))->toBe(43);
})->group('day02', 'sample');

test('day 2 part 2 2x3x4', function (): void {
  $presents = [...input(string_to_stream('2x3x4'))];
  expect(part2($presents))->toBe(34);
})->group('day02', 'sample');

test('day 2 part 2 1x1x10', function (): void {
  $presents = [...input(string_to_stream('1x1x10'))];
  expect(part2($presents))->toBe(14);
})->group('day02', 'sample');

test('day 2 input', function (): void {
  $handle = fopen('src/Day02/input.txt', 'r+');
  $presents = [...input($handle)];
  expect(part1($presents))->toBe(1588178);
  expect(part2($presents))->toBe(3783758);
})->group('day02', 'input');
