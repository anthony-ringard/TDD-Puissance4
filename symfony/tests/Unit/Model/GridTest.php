<?php

declare(strict_types=1);

namespace App\tests\Unit\Model;

use App\Model\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    public function testInitGrid()
    {
        $this->assertEquals('App\Model\Grid', Grid::class);
    }

    public function testNewInstanceGrid()
    {
        $expected = [
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
        ];

        $grid = new  Grid();

        $this->assertEquals($expected, $grid->getGrid());
    }

    public function testAddDiscXToColumn4()
    {
        $grid = new  Grid();
        $expected = [
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', 'X', '', '', ''],
        ];

        $this->assertEquals($expected, $grid->play('X', 4));
    }

    public function testAddDiscOToColumn2()
    {
        $grid = new  Grid();
        $expected = [
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', 'O', '', '', '', '', ''],
        ];

        $this->assertEquals($expected, $grid->play('O', 2));
    }

    public function testAddDiscOToColumn2AndXcolumn4()
    {
        $expected = [
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', 'O', '', 'X', '', '', ''],
        ];

        $grid = new  Grid();
        $grid->play('O', 2);
        $grid->play('X', 4);

        $this->assertEquals($expected, $grid->getGrid());
    }

    public function testAddDiscOToColumn2AndXcolumn2()
    {
        $expected = [
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', '', '', '', '', '', ''],
            ['', 'X', '', '', '', '', ''],
            ['', 'O', '', '', '', '', ''],
        ];

        $grid = new  Grid();
        $grid->play('O', 2);
        $grid->play('X', 2);

        $this->assertEquals($expected, $grid->getGrid());
    }
}
