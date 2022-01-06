<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day14;

class Reindeer
{
  private int $time = 0;
  private int $distance = 0;

  public function __construct(
    public readonly int $speed,
    public readonly int $fly,
    public readonly int $rest,
  ) {
  }

  public function tick(): void
  {
    $flying = $this->time % ($this->fly + $this->rest) < $this->fly;
    if ($flying) $this->distance += $this->speed;
    $this->time++;
  }

  public function distance(): int
  {
    return $this->distance;
  }
}

/** @return Reindeer[] */
function input($handle): iterable
{
  while ($vals = fscanf($handle, '%s can fly %d km/s for %d seconds, but then must rest for %d seconds.')) {
    [$name, $speed, $fly, $rest] = $vals;
    yield $name => new Reindeer($speed, $fly, $rest);
  }
}

/**
 * @param Reindeer[] $reindeers
 * @param int $seconds
 */
function part1(array $reindeers, int $seconds = 2503): int
{
  $dists = array_map(function (Reindeer $reindeer) use ($seconds): int {
    return (int) ceil($seconds / ($reindeer->fly + $reindeer->rest)) * $reindeer->speed * $reindeer->fly;
  }, $reindeers);
  return max($dists);
}

function part2(array $reindeers, int $seconds = 2503): int
{
  $points = array_map(fn (): int => 0, $reindeers);
  for ($s = 0; $s < $seconds; $s++) {
    array_walk($reindeers, fn (Reindeer $r) => $r->tick());
    $dist = max(array_map(fn (Reindeer $r): int => $r->distance(), $reindeers));
    $leads = array_filter($reindeers, fn (Reindeer $r): bool => $r->distance() === $dist);
    foreach (array_keys($leads) as $name) {
      $points[$name]++;
    }
  }
  return max($points);
}
