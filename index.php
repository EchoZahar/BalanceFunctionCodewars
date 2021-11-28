<?php

/**
 * @param $left
 * @param $right
 * @return string
 * первый вариант
 */
function balance($left, $right) {
    $replaces = [
        '?' => 3,
        '!' => 2,
    ];
    /**
     * array_keys — Возвращает все или некоторое подмножество ключей массива
     * https://www.php.net/manual/ru/function.array-keys.php
     * array_values — Выбирает все значения массива
     * https://www.php.net/manual/ru/function.array-values.php
     */
    $leftSide = str_replace(array_keys($replaces), array_values($replaces), $left);
    $rightSide = str_replace(array_keys($replaces), array_values($replaces), $right);
    var_dump($leftSide, $rightSide);
    if ($leftSide > $rightSide) {
        return 'left side';
    } else if ($rightSide > $leftSide) {
        return 'right side';
    } else {
        return 'balance';
    }
}

print_r(balance("!!","??") . '<br />'); // 22 < 33
print_r(balance("!??","?!!") . '<br />'); // 233 < 322
print_r(balance("!?!!","?!?") . '<br />'); // 2322 > 323
print_r(balance("!!???!????","??!!?!!!!!!!") . '<br />'); // 2233323333 < 332232222222

/**
 * @param $left
 * @param $right
 * Второй вариант использовать strtr
 * https://www.php.net/manual/ru/function.strtr.php
 */
function balanceWithSTRTR($left, $right) {
    $replaces = [
        '?' => 3,
        '!' => 2,
    ];
    // Заголовок второго варианта
    $header = 'Вариант 2: ';
    // Левое значение.
    $leftSide = strtr($left, $replaces);
    // Правое значение
    $rightSide = strtr($right, $replaces);
    // Условия
    if ($leftSide > $rightSide) {
        return $header . 'left side';
    } else if ($rightSide > $leftSide) {
        return $header . 'right side';
    } else {
        return $header . 'balance';
    }
}

print_r(balanceWithSTRTR("!!","??") . '<br />');
print_r(balanceWithSTRTR("!??","?!!") . '<br />');
print_r(balanceWithSTRTR("!?!!","?!?") . '<br />');
print_r(balanceWithSTRTR("!!???!????","??!!?!!!!!!!"));
