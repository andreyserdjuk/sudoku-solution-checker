<?php

namespace Sudoku;

class SudokuChecker2
{
    public function check(array $sudoku)
    {
        $blockColumns = [];
        $columns = [];

        foreach ($sudoku as $rowIndex => $row) {
            $rowUniq = 0;
            $colIndex = 0;
            foreach (array_chunk($row, 3) as $rowBlockIndex => $rowBlock) {
                foreach ($rowBlock as $rowEl) {
                    if (!isset($columns[$colIndex])) {
                        $columns[$colIndex] = 0;
                    }
                    $columns[$colIndex] ^= $row[$colIndex];
                    ++$colIndex;

                    $rowUniq ^= $rowEl;
                    if (!isset($blockColumns[$rowBlockIndex])) {
                        $blockColumns[$rowBlockIndex] = 0;
                    }
                    $blockColumns[$rowBlockIndex] ^= $rowEl;
                }
            }

            // check unique row
            if (1 !== $rowUniq) {
                return false;
            }

            if (0 === ($rowIndex + 1) % 3) {
                // check unique section
                foreach ($blockColumns as $blockColumn) {
                    if (1 !== $blockColumn) {
                        return false;
                    }
                }
                $blockColumns = [];
            }
        }

        foreach ($columns as $column) {
            if (1 !== $column) {
                return false;
            }
        }

        return true;
    }
}
