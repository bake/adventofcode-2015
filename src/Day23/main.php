<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day23;

function input($handle): array
{
  $instructions = explode(PHP_EOL, trim(stream_get_contents($handle)));
  $instructions = array_map(fn (string $ins): callable => match (1) {
    preg_match('/^hlf (\w)$/', $ins, $vals) => fn ($p) => new Program(
      $p->pointer + 1,
      [...$p->register, $vals[1] => $p->register[$vals[1]] / 2],
    ),
    preg_match('/^tpl (\w)$/', $ins, $vals) => fn ($p) => new Program(
      $p->pointer + 1,
      [...$p->register, $vals[1] => $p->register[$vals[1]] * 3],
    ),
    preg_match('/^inc (\w)$/', $ins, $vals) => fn ($p) => new Program(
      $p->pointer + 1,
      [...$p->register, $vals[1] => $p->register[$vals[1]] + 1],
    ),
    preg_match('/^jmp ([-+]\d+)$/', $ins, $vals) => fn ($p) => new Program(
      $p->pointer + $vals[1],
      $p->register,
    ),
    preg_match('/^jie (\w), ([-+]\d+)$/', $ins, $vals) => fn ($p) => new Program(
      $p->pointer + match ($p->register[$vals[1]] % 2 === 0) {
        true => $vals[2],
        false => 1,
      },
      $p->register,
    ),
    preg_match('/^jio (\w), ([-+]\d+)$/', $ins, $vals) => fn ($p) => new Program(
      $p->pointer + match ($p->register[$vals[1]] === 1) {
        true => $vals[2],
        false => 1,
      },
      $p->register,
    ),
  }, $instructions);
  return $instructions;
}

class Program
{
  public function __construct(
    public readonly int $pointer = 0,
    public readonly array $register = ['a' => 0, 'b' => 0],
  ) {
  }
}

/** @param callable[] $instructions */
function part1(array $instructions): int
{
  $p = new Program;
  while ($p->pointer < count($instructions)) {
    $p = $instructions[$p->pointer]($p);
  }
  return $p->register['b'];
}

/** @param callable[] $instructions */
function part2(array $instructions): int
{
  $p = new Program(register: ['a' => 1, 'b' => 0]);
  while ($p->pointer < count($instructions)) {
    $p = $instructions[$p->pointer]($p);
  }
  return $p->register['b'];
}
