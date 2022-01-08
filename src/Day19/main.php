<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day19;

class Input
{
  /**
   * @param string $molecule
   * @param Replacement[] $replacements
   */
  public function __construct(
    public readonly string $molecule,
    public readonly array $replacements,
  ) {
  }
}

class Replacement
{
  public function __construct(
    public readonly string $from,
    public readonly string $to,
  ) {
  }
}

function input($handle): Input
{
  $input = trim(stream_get_contents($handle));
  [$replacements, $molecule] = explode(PHP_EOL . PHP_EOL, $input);
  $replacements = explode(PHP_EOL, trim($replacements));
  $replacements = array_map(fn ($r) => explode(' => ', $r), $replacements);
  $replacements = array_map(fn ($r) => new Replacement($r[0], $r[1]), $replacements);
  return new Input($molecule, $replacements);
}

/**
 * @param string $molecule
 * @param Replacement[] $replacements
 */
function part1(string $molecule, array $replacements): int
{
  $molecules = [];
  foreach ($replacements as $r) {
    for (
      $offset = strpos($molecule, $r->from);
      $offset !== false;
      $offset = strpos($molecule, $r->from, $offset + strlen($r->from))
    ) {
      $tmp = substr_replace($molecule, $r->to, $offset, strlen($r->from));
      $molecules[$tmp] ??= 0;
      $molecules[$tmp]++;
    }
  }
  return count($molecules);
}

/**
 * @param string $molecule
 * @param Replacement[] $replacements
 */
function part2(string $molecule, array $replacements): int
{
  $depth = 0;
  while ($molecule != 'e') {
    foreach ($replacements as $r) {
      if (!str_contains($molecule, $r->to)) {
        continue;
      }
      $depth++;
      $molecule = preg_replace("/{$r->to}/", $r->from, $molecule, 1);
    }
  }
  return $depth;
}
