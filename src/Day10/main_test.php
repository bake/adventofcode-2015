<?php

namespace Bake\AdventOfCode2015\Day10;

require __DIR__ . '/main.php';

test('day 10 sample', function (): void {
  expect(look_and_say('1'))->toBe('11');
  expect(look_and_say('11'))->toBe('21');
  expect(look_and_say('21'))->toBe('1211');
  expect(look_and_say('1211'))->toBe('111221');
  expect(look_and_say('111221'))->toBe('312211');
})->group('day10', 'sample');

test('day 10 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $word = input($handle);
  expect(part1($word))->toBe(360154);
  expect(part2($word))->toBe(5103798);
})->group('day10', 'input');
