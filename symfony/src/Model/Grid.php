<?php

declare(strict_types=1);

namespace App\Model;

class Grid
{
    private const COLUMN = 7;
    private const LINE = 6;
    private array $grid = [];

    public function __construct()
    {
        $grid = [];
        for ($i = 0; $i < self::LINE; ++$i) {
            $grid[] = array_fill(0, self::COLUMN, '');
        }

        $this->grid = $grid;
    }

    public function getGrid(): array
    {
        return $this->grid;
    }

    public function play(string $symbol, int $col)
    {
        --$col;

        return  $this->grid = $this->addDiscToGrid($symbol, $col, $this->getGrid());
    }

    private function addDiscToGrid(string $symbol, int $col, array $grid): array
    {
        $line = self::LINE - 1;

        while ($this->isNotEmpty($col, $grid, $line)) {
            --$line;
        }

        $grid[$line][$col] = $symbol;

        return $grid;
    }

    private function isNotEmpty(int $col, array $grid, int $line): bool
    {
        return !empty($grid[$line][$col]);
    }
}
