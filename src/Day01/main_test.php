<?php

namespace Bake\AdventOfCode2015\Day01;

require __DIR__ . '/main.php';

test('day 1 part 1 (())', function (): void {
  expect(part1(str_split('(())')))->toBe(0);
})->group('day01', 'sample');

test('day 1 part 1 ()()', function (): void {
  expect(part1(str_split('()()')))->toBe(0);
})->group('day01', 'sample');

test('day 1 part 1 (((', function (): void {
  expect(part1(str_split('(((')))->toBe(3);
})->group('day01', 'sample');

test('day 1 part 1 (()(()(', function (): void {
  expect(part1(str_split('(()(()(')))->toBe(3);
})->group('day01', 'sample');

test('day 1 part 1 ))(((((', function (): void {
  expect(part1(str_split('))(((((')))->toBe(3);
})->group('day01', 'sample');

test('day 1 part 1 ())', function (): void {
  expect(part1(str_split('())')))->toBe(-1);
})->group('day01', 'sample');

test('day 1 part 1 ))(', function (): void {
  expect(part1(str_split('))(')))->toBe(-1);
})->group('day01', 'sample');

test('day 1 part 1 )))', function (): void {
  expect(part1(str_split(')))')))->toBe(-3);
})->group('day01', 'sample');

test('day 1 part 1 )())())', function (): void {
  expect(part1(str_split(')())())')))->toBe(-3);
})->group('day01', 'sample');

test('day 1 part 2 )', function (): void {
  expect(part2(str_split(')')))->toBe(1);
})->group('day01', 'sample');

test('day 1 part 2 ()())', function (): void {
  expect(part2(str_split('()())')))->toBe(5);
})->group('day01', 'sample');

test('day 1 input', function (): void {
  $handle = fopen('src/Day01/input.txt', 'r');
  $instructions = input($handle);
  expect(part1($instructions))->toBe(138);
  expect(part2($instructions))->toBe(1771);
})->group('day01', 'input');
