<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\expToString;

// random znak
function randomSign()
{
    $sign = ['+', '-', '*'];
    $random = rand(0, 2);
    return $sign[$random];
}


// add sign to array of number;
function addSign($arr)
{
    $arr['sign'] = randomSign();
    return $arr;
}

// принимает массив типа
//     Array
//     (
//         [firstNum] => 25
//         [sign] => +
//         [secondNum] => 42
//     )
// return => 25 + 42 возвращает результат выражения
function countExp($arr)
{
    if ($arr['sign'] == '+') {
        return $arr['firstNum'] + $arr['secondNum'];
    } elseif ($arr['sign'] == '-') {
        return $arr['firstNum'] - $arr['secondNum'];
    } else {
        return $arr['firstNum'] * $arr['secondNum'];
    }
}



// корректный ли ответ?
function isCorrectAnswer($answer, $exp, $name)
{
    $expResult = countExp($exp);
    $expStr = expToString($exp);
    if ($answer != $expResult) {
        line("Question: {$expStr}");
        line("Your answer: {$answer}");
        line("{$answer} is wrong answer ;(. Correct answer was {$expResult}. Let's try again, {$name}!");
        die;
    } else {
        line("Correct!");
        return 1;
    }
}
