<?php

namespace Bake\AdventOfCode2015\Day03;

require __DIR__ . '/main.php';

test('day 3 part 1 >', function (): void {
  $moves = input(string_to_stream('>'));
  expect(part1($moves))->toBe(2);
})->group('day03', 'sample');

test('day 3 part 1 ^>v<', function (): void {
  $moves = input(string_to_stream('^>v<'));
  expect(part1($moves))->toBe(4);
})->group('day03', 'sample');

test('day 3 part 1 ^v^v^v^v^v', function (): void {
  $moves = input(string_to_stream('^v^v^v^v^v'));
  expect(part1($moves))->toBe(2);
})->group('day03', 'sample');

test('day 3 part 2 ^v', function (): void {
  $moves = input(string_to_stream('^v'));
  expect(part2($moves))->toBe(3);
})->group('day03', 'sample');

test('day 3 part 2 ^>v<', function (): void {
  $moves = input(string_to_stream('^>v<'));
  expect(part2($moves))->toBe(3);
})->group('day03', 'sample');

test('day 3 part 2 ^v^v^v^v^v', function (): void {
  $moves = input(string_to_stream('^v^v^v^v^v'));
  expect(part2($moves))->toBe(11);
})->group('day03', 'sample');

test('day 3 input', function (): void {
  $handle = fopen('src/Day03/input.txt', 'r');
  $moves = input($handle);
  expect(part1($moves))->toBe(2572);
  expect(part2($moves))->toBe(2631);
})->group('day03', 'input');
