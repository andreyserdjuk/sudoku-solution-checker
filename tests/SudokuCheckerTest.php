<?php

namespace Sudoku\Tests;

use PHPUnit\Framework\TestCase;
use Sudoku\SudokuChecker;
use Sudoku\SudokuChecker2;

class SudokuCheckerTest extends TestCase
{
    /**
     * @dataProvider solutions
     * @covers \Sudoku\SudokuChecker::check()
     */
    public function testSudokuSolutionChecker(array $sudoku, bool $isValid)
    {
        $checker = new SudokuChecker();
        $this->assertEquals($isValid, $checker->check($sudoku));
    }

    /**
     * @dataProvider solutions
     * @covers \Sudoku\SudokuChecker2::check()
     */
    public function testSudokuSolutionChecker2(array $sudoku, bool $isValid)
    {
        $checker = new SudokuChecker2();
        $this->assertEquals($isValid, $checker->check($sudoku));
    }

    public function solutions()
    {
        return [
            [
                [
                    [5, 3, 4, 6, 7, 8, 9, 1, 2],
                    [6, 7, 2, 1, 9, 5, 3, 4, 8],
                    [1, 9, 8, 3, 4, 2, 5, 6, 7],
                    [8, 5, 9, 7, 6, 1, 4, 2, 3],
                    [4, 2, 6, 8, 5, 3, 7, 9, 1],
                    [7, 1, 3, 9, 2, 4, 8, 5, 6],
                    [9, 6, 1, 5, 3, 7, 2, 8, 4],
                    [2, 8, 7, 4, 1, 9, 6, 3, 5],
                    [3, 4, 5, 2, 8, 6, 1, 7, 9],
                ],
                true,
            ],
            [
                [
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                    [5, 5, 5, 5, 5, 5, 5, 5, 5],
                ],
                false,
            ],
            [
                [
                    [5, 3, 4, 6, 7, 8, 9, 1, 2],
                    [6, 7, 2, 1, 5, 5, 3, 4, 8],
                    [1, 9, 8, 3, 4, 2, 5, 6, 7],
                    [8, 5, 9, 7, 6, 1, 4, 2, 3],
                    [4, 2, 6, 8, 5, 3, 7, 9, 1],
                    [7, 1, 3, 9, 2, 4, 8, 5, 6],
                    [9, 6, 1, 5, 3, 7, 2, 8, 4],
                    [2, 8, 7, 4, 1, 9, 6, 3, 5],
                    [3, 4, 5, 2, 8, 6, 1, 7, 9],
                ],
                false,
            ],
            [
                [
                    [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    [2, 3, 1, 5, 6, 4, 8, 9, 7],
                    [3, 1, 2, 6, 4, 5, 9, 7, 8],
                    [4, 5, 6, 7, 8, 9, 1, 2, 3],
                    [5, 6, 4, 8, 9, 7, 2, 3, 1],
                    [6, 4, 5, 9, 7, 8, 3, 1, 2],
                    [7, 8, 9, 1, 2, 3, 4, 5, 6],
                    [8, 9, 7, 2, 3, 1, 5, 6, 4],
                    [9, 7, 8, 3, 1, 2, 6, 4, 5],
                ],
                false,
            ],
        ];
    }
}
