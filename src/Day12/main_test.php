<?php

namespace Bake\AdventOfCode2015\Day12;

require __DIR__ . '/main.php';

test('day 12 part 1 sample', function (): void {
  expect(part1(json_decode('[1,2,3]')))->toBe(6);
  expect(part1(json_decode('{"a":2,"b":4}')))->toBe(6);
  expect(part1(json_decode('[[[3]]]')))->toBe(3);
  expect(part1(json_decode('{"a":{"b":4},"c":-1}')))->toBe(3);
  expect(part1(json_decode('{"a":[-1,1]}')))->toBe(0);
  expect(part1(json_decode('[-1,{"a":1}]')))->toBe(0);
  expect(part1(json_decode('[]')))->toBe(0);
  expect(part1(json_decode('{}')))->toBe(0);
})->group('day12', 'sample');

test('day 12 part 2 sample', function (): void {
  expect(part2(json_decode('[1,2,3]')))->toBe(6);
  expect(part2(json_decode('[1,{"c":"red","b":2},3]')))->toBe(4);
  expect(part2(json_decode('{"d":"red","e":[1,2,3,4],"f":5}')))->toBe(0);
  expect(part2(json_decode('[1,"red",5]')))->toBe(6);
})->group('day12', 'sample');

test('day 12 input', function (): void {
  $handle = fopen(__DIR__ . '/input.txt', 'r');
  $data = input($handle);
  expect(part1($data))->toBe(156366);
  expect(part2($data))->toBe(96852);
})->group('day12', 'input');
