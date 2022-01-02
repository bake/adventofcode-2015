<?php

namespace Bake\AdventOfCode2015\Day07;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/main.php';

test('day 7 part 1 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  123 -> x
  456 -> y
  x AND y -> d
  x OR y -> e
  x LSHIFT 2 -> f
  y RSHIFT 2 -> g
  NOT x -> h
  NOT y -> i
  PLAIN);
  $instructions = [...input($handle)];
  expect(execute('d', $instructions))->toBe(72);
  expect(execute('e', $instructions))->toBe(507);
  expect(execute('f', $instructions))->toBe(492);
  expect(execute('g', $instructions))->toBe(114);
  expect(execute('h', $instructions))->toBe(65412);
  expect(execute('i', $instructions))->toBe(65079);
  expect(execute('x', $instructions))->toBe(123);
  expect(execute('y', $instructions))->toBe(456);
})->group('day07', 'sample');

test('day 7 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $instructions = [...input($handle)];
  expect(part1($instructions))->toBe(3176);
  expect(part2($instructions))->toBe(14710);
})->group('day07', 'input');
