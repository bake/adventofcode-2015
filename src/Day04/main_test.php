<?php

namespace Bake\AdventOfCode2015\Day04;

require __DIR__ . '/main.php';

test('day 4 part 1 abcdef', function (): void {
  expect(part1('abcdef'))->toBe(609043);
})->group('day04', 'sample');

test('day 4 part 1 pqrstuv', function (): void {
  expect(part1('pqrstuv'))->toBe(1048970);
})->group('day04', 'sample');

test('day 4 input', function (): void {
  $handle = fopen('src/Day04/input.txt', 'r');
  $key = input($handle);
  expect(part1($key))->toBe(117946);
  expect(part2($key))->toBe(3938038);
})->group('day04', 'input');
