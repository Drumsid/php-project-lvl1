<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expressionToString;
use function BrainGames\General\generateTwoRandomNumber;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

// random znak
function randomSign()
{
    $sign = ['+', '-', '*'];
    $random = rand(0, 2);
    return $sign[$random];
}


// add sign to array of number;
function addRandomSignToExpression($arr)
{
    $arr['sign'] = randomSign();
    return $arr;
}

// принимает массив типа
//     Array
//     (
//         [firstNumber] => 25
//         [sign] => +
//         [secondNumber] => 42
//     )
// return => 25 + 42 возвращает результат выражения
function countExpression($arr)
{
    if ($arr['sign'] == '+') {
        return $arr['firstNumber'] + $arr['secondNumber'];
    } elseif ($arr['sign'] == '-') {
        return $arr['firstNumber'] - $arr['secondNumber'];
    } else {
        return $arr['firstNumber'] * $arr['secondNumber'];
    }
}

// generate expression
function generateExpression()
{
    $arrExp = generateTwoRandomNumber();
    return addRandomSignToExpression($arrExp);
}

//generate array of three array numbers
function generateThreeExpressions()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateExpression();
    }
    return $result;
}

// array string expression
function stringExpressions($threeExpressions)
{
    $result = [];
    foreach ($threeExpressions as $expression) {
        $result[] = expressionToString($expression);
    }
    return $result;
}

// array correct answer
function correctAnswers($threeExpressions)
{
    $result = [];
    foreach ($threeExpressions as $expression) {
        $result[] = countExpression($expression);
    }
    return $result;
}

// run calc game
function runCalcGame()
{
    $generateThreeExpressions = generateThreeExpressions();

    $threeExpressions = stringExpressions($generateThreeExpressions);
    $correctAnswers = correctAnswers($generateThreeExpressions);

    $combineOfExpressionsAndAnswers = array_combine($threeExpressions, $correctAnswers);

    runEngine($combineOfExpressionsAndAnswers, "What is the result of the expression?\n");
}
