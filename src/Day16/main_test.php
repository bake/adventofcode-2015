<?php

namespace Bake\AdventOfCode2015\Day16;

require __DIR__ . '/main.php';

test('day 16 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $sues = iterator_to_array(input($handle));
  expect(part1($sues))->toBe(373);
  expect(part2($sues))->toBe(260);
})->group('day16', 'input');
