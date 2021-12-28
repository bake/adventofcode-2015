<?php

namespace Bake\AdventOfCode2015\Day05;

require __DIR__ . '/main.php';

test('day 5 part 1 ugknbfddgicrmopn', function (): void {
  expect(nice1('ugknbfddgicrmopn'))->toBeTrue();
})->group('day05', 'sample');

test('day 5 part 1 aaa', function (): void {
  expect(nice1('aaa'))->toBeTrue();
})->group('day05', 'sample');

test('day 5 part 1 jchzalrnumimnmhp', function (): void {
  expect(nice1('jchzalrnumimnmhp'))->toBeFalse();
})->group('day05', 'sample');

test('day 5 part 1 haegwjzuvuyypxyu', function (): void {
  expect(nice1('haegwjzuvuyypxyu'))->toBeFalse();
})->group('day05', 'sample');

test('day 5 part 1 dvszwmarrgswjxmb', function (): void {
  expect(nice1('dvszwmarrgswjxmb'))->toBeFalse();
})->group('day05', 'sample');

test('day 5 part 2 qjhvhtzxzqqjkmpb', function (): void {
  expect(nice2('qjhvhtzxzqqjkmpb'))->toBeTrue();
})->group('day05', 'sample');

test('day 5 part 2 xxyxx', function (): void {
  expect(nice2('xxyxx'))->toBeTrue();
})->group('day05', 'sample');

test('day 5 part 2 uurcxstgmygtbstg', function (): void {
  expect(nice2('uurcxstgmygtbstg'))->toBeFalse();
})->group('day05', 'sample');

test('day 5 part 2 ieodomkazucvgmuy', function (): void {
  expect(nice2('ieodomkazucvgmuy'))->toBeFalse();
})->group('day05', 'sample');

test('day 4 input', function (): void {
  $handle = fopen('src/Day05/input.txt', 'r');
  $strings = input($handle);
  expect(part1($strings))->toBe(236);
  expect(part2($strings))->toBe(51);
})->group('day05', 'input');
