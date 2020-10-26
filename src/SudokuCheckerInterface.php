<?php

namespace Sudoku;

interface SudokuCheckerInterface
{
    public function check(array $sudoku): bool;
}
