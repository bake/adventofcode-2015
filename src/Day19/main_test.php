<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day19;

require __DIR__ . '/main.php';

test('day 19 sample HOH', function (): void {
  $handle = string_to_stream(<<<PLAIN
  e => H
  e => O
  H => HO
  H => OH
  O => HH  

  HOH
  PLAIN);
  $input = input($handle);
  expect(part1($input->molecule, $input->replacements))->toBe(4);
  expect(part2($input->molecule, $input->replacements))->toBe(3);
})->group('day19', 'sample');

test('day 19 sample HOHOHO', function (): void {
  $handle = string_to_stream(<<<PLAIN
   e => H
   e => O
   H => HO
   H => OH
   O => HH   

   HOHOHO
   PLAIN);
  $input = input($handle);
  expect(part1($input->molecule, $input->replacements))->toBe(7);
  expect(part2($input->molecule, $input->replacements))->toBe(6);
})->group('day19', 'sample');

test('day 19 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $input = input($handle);
  expect(part1($input->molecule, $input->replacements))->toBe(509);
  expect(part2($input->molecule, $input->replacements))->toBe(195);
})->group('day19', 'input');
