<?php

declare(strict_types=1);

namespace Bake\AdventOfCode2015\Day18;

class Grid
{
  /** @var Array<Array<bool>> */
  private array $grid;

  public function __construct(
    public readonly int $width,
    public readonly int $height,
  ) {
  }

  public static function fromString(string $grid): self
  {
    $rows = explode(PHP_EOL, trim($grid));
    $grid = new self(strlen(reset($rows)), count($rows));
    foreach ($rows as $y => $row) {
      foreach (str_split($row) as $x => $cell) {
        $grid->set(new Point($x, $y), match ($cell) {
          '.' => false,
          '#' => true,
        });
      }
    }
    return $grid;
  }

  public function at(Point $p): bool
  {
    if ($p->y < 0 || $p->y >= $this->height) return false;
    if ($p->x < 0 || $p->x >= $this->width) return false;
    return $this->grid[$p->y][$p->x];
  }

  public function set(Point $p, bool $state): void
  {
    if ($p->y < 0 || $p->y >= $this->height) return;
    if ($p->x < 0 || $p->x >= $this->width) return;
    $this->grid[$p->y][$p->x] = $state;
  }

  public function neighbors(Point $p): int
  {
    $neighbors = 0;
    for ($y = -1; $y <= 1; $y++) {
      for ($x = -1; $x <= 1; $x++) {
        if ($y === 0 && $x === 0) continue;
        $neighbors += $this->at(new Point($p->x + $x, $p->y + $y));
      }
    }
    return $neighbors;
  }

  public function count(): int
  {
    $sum = 0;
    for ($y = 0; $y < $this->height; $y++) {
      for ($x = 0; $x < $this->width; $x++) {
        $sum += (int) $this->at(new Point($x, $y));
      }
    }
    return $sum;
  }
}
