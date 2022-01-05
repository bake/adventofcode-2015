<?php

namespace Bake\AdventOfCode2015\Day13;

require __DIR__ . '/main.php';

test('day 13 part 1 sample', function (): void {
  $handle = string_to_stream(<<<PLAIN
  Alice would gain 54 happiness units by sitting next to Bob.
  Alice would lose 79 happiness units by sitting next to Carol.
  Alice would lose 2 happiness units by sitting next to David.
  Bob would gain 83 happiness units by sitting next to Alice.
  Bob would lose 7 happiness units by sitting next to Carol.
  Bob would lose 63 happiness units by sitting next to David.
  Carol would lose 62 happiness units by sitting next to Alice.
  Carol would gain 60 happiness units by sitting next to Bob.
  Carol would gain 55 happiness units by sitting next to David.
  David would gain 46 happiness units by sitting next to Alice.
  David would lose 7 happiness units by sitting next to Bob.
  David would gain 41 happiness units by sitting next to Carol.
  PLAIN);
  $happiness = input($handle);
  expect(part1($happiness))->toBe(330);
})->group('day13', 'sample');

test('day 13 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $happiness = input($handle);
  expect(part1($happiness))->toBe(733);
  expect(part2($happiness))->toBe(725);
})->group('day13', 'input');
