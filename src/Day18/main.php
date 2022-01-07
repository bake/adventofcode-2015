<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day18;

function input($handle): Grid
{
  return Grid::fromString(stream_get_contents($handle));
}

function step(Grid $grid): Grid
{
  $tmp = clone $grid;
  for ($y = 0; $y < $grid->height; $y++) {
    for ($x = 0; $x < $grid->width; $x++) {
      $p = new Point($x, $y);
      $neighbors = $grid->neighbors(new Point($x, $y));
      $tmp->set($p, match ($grid->at($p)) {
        true => $neighbors === 2 || $neighbors === 3,
        false => $neighbors === 3,
        default => $grid->at($p),
      });
    }
  }
  return $tmp;
}

function part1(Grid $grid, int $steps = 100): int
{
  for ($i = 0; $i < $steps; $i++) {
    $grid = step($grid);
  }
  return $grid->count();
}

function part2(Grid $grid, int $steps = 100): int
{
  $turn_corners_on = function (Grid $grid): Grid {
    $grid = clone $grid;
    $grid->set(new Point(0, 0), true);
    $grid->set(new Point($grid->height - 1, 0), true);
    $grid->set(new Point(0, $grid->width - 1), true);
    $grid->set(new Point($grid->height - 1, $grid->width - 1), true);
    return $grid;
  };
  $grid = $turn_corners_on($grid);
  for ($i = 0; $i < $steps; $i++) {
    $grid = $turn_corners_on(step($grid));
  }
  return $grid->count();
}
