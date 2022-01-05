<?php

namespace Bake\AdventOfCode2015\Day11;

require __DIR__ . '/main.php';

test('day 11 sample', function (): void {
  expect(part1('abcdefgh'))->toBe('abcdffaa');
  expect(part1('ghijklmn'))->toBe('ghjaabcc');
})->group('day11', 'sample');

test('day 11 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $password = input($handle);
  expect(part1($password))->toBe('cqjxxyzz');
  expect(part2($password))->toBe('cqkaabcc');
})->group('day11', 'input');
