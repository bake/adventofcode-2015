<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day15;

/** @return iterable<String,Ingredient> */
function input($handle): iterable
{
  while ($vals = fscanf($handle, '%s capacity %d, durability %d, flavor %d, texture %d, calories %d')) {
    [, $capacity, $durability, $flavor, $texture, $calories] = $vals;
    yield new Ingredient($capacity, $durability, $flavor, $texture, $calories);
  }
}

/**
 * Get all possible combinations of $num numbers that add up to $max.
 *
 * @param int $num
 * @param int $max
 * @return iterable<int[]>
 */
function recipes(int $num, int $max): iterable
{
  if ($num === 1) {
    yield [$max];
    return;
  }
  for ($i = 0; $i <= $max; $i++) {
    foreach (recipes($num - 1, $max - $i) as $recipe) {
      if (array_sum([$i, ...$recipe]) !== $max) continue;
      yield [$i, ...$recipe];
    }
  }
}

/** @param iterable<String,Ingredient> */
function part1(array $ingredients): int
{
  $teaspoons = 100;
  $score = 0;
  foreach (recipes(count($ingredients), $teaspoons) as $recipe) {
    $tmp = array_map(fn ($i, $a) => $i->times($a), $ingredients, $recipe);
    $new = array_reduce($tmp, fn ($a, $b) => $a->add($b), Ingredient::empty());
    $score = max($score, $new->score());
  }
  return $score;
}

/** @param Ingredient[] */
function part2(array $ingredients): int
{
  [$teaspoons, $calories] = [100, 500];
  $score = 0;
  foreach (recipes(count($ingredients), $teaspoons) as $recipe) {
    $tmp = array_map(fn ($i, $a) => $i->times($a), $ingredients, $recipe);
    $new = array_reduce($tmp, fn ($a, $b) => $a->add($b), Ingredient::empty());
    if ($new->calories !== $calories) continue;
    $score = max($score, $new->score());
  }
  return $score;
}
