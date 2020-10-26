### Sudoku solution checker  

#### Install phpunit and run tests
```bash
composer install
php bin/phpunit
```

Regular 9x9 Sudoku puzzle solution is a matrix of numbers placed exactly once in: 
 * nine rows
 * nine columns
 * nine 3x3 boxes  

First thought is to write few foreach cycles with calls like `count(array_unique($rowElements))`.
The first implementation is `./src/SudokuChecker.php`.  

However I think the goal is to implement algorithm with minimal complexity. So is it possible to ensure that
sequence of number is unique not using array? I found that XOR of numbers 1...9 = 1. Instead of allocation memory 
for each element of array all elements can be XOR'ed. If result = 1 - all elements are unique:
```
8 4 2 1    dec
-------    ---
1 0 0 1     9
1 0 0 0     8
0 1 1 1     7
0 1 1 0     6
0 1 0 1     5
0 1 0 0     4
0 0 1 1     3
0 0 1 0     2
0 0 0 1     1
------- XOR all
0 0 0 1     1
```
See `./src/SudokuChecker2.php`. As I tried to minimize complexity to O(2n) the algorithm looks compressed.  
As [OOD sudoku checker](https://github.com/sobit/sudoku-checker) is already written I see no need to create another one.