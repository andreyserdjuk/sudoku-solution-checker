<?php

declare(strict_types=1);

namespace Sudoku;

class SudokuChecker
{
    public function check(array $sudoku)
    {
        $columns = [];

        // check unique row
        foreach ($sudoku as $rowIndex => $row) {
            if (9 !== count(array_unique($row))) {
                return false;
            }

            foreach (array_chunk($row, 3) as $rowBlockIndex => $rowBlock) {
                if (empty($columns[$rowBlockIndex])) {
                    $columns[$rowBlockIndex] = $rowBlock;
                } else {
                    $columns[$rowBlockIndex] = array_merge($columns[$rowBlockIndex], $rowBlock);
                }
            }

            if (0 === ($rowIndex + 1) % 3) {
                // check unique section
                foreach ($columns as $index => $column) {
                    if (9 !== count(array_unique($column))) {
                        return false;
                    }
                }
            }
        }

        // check unique column
        for ($i = 1; $i < 9; ++$i) {
            $column = array_column($sudoku, $i);
            if (count(array_unique($column)) !== 9) {
                return false;
            }
        }

        return true;
    }
}
