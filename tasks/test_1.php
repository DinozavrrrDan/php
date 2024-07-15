<?php

// Исправьте ошибки в приведенном ниже коде. Ваш исправленный код должен корректно выполнять поставленные задачи

/**
 * Вычисляет логарифм
 */
function calculateFactorial(int $number): int
{ //лучше int факториал целое число
    if ($number <= 1) {
        return 1; //;
    } else {
        return $number * calculateFactorial($number - 1); // + на - изменил
    }
}

/**
 * Проверяет, является ли число простым
 */
function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) { //++ и просто sqrt
        if ($num % $i == 0) { // == проверяет равенство
            return true;
        }
    }
    return true;
}

// Исправлены ' на "
echo "Введите число: ";
$number = readline();
echo "Факториал $number is: " . calculateFactorial($number) . "\n"; // опечатка в переменной

if (isPrime($number)) {
    echo "$number - это простое число.\n";
} else {
    echo "$number - это не простое число.\n";
}

?>