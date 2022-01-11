<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day25;

function input($handle): array
{
  return fscanf($handle, 'To continue, please consult the code grid in the manual.  Enter the code at row %d, column %d.');
}

function part1(int $row, int $col): int
{
  [$r, $c] = [1, 1];
  $code = 20151125;
  while ($r !== $row || $c !== $col) {
    $code *= 252533;
    $code %= 33554393;
    [$r, $c] = [$r - 1, $c + 1];
    if ($r === 0) [$r, $c] = [$c, 1];
  }
  return $code;
}
