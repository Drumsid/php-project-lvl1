<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

// random znak
function randomSign()
{
    $sign = ['+', '-', '*'];
    $random = rand(0, 2);
    return $sign[$random];
}

// generate two random integer
// return
//     Array
//     (
//         [firstNumber] => 25
//         [secondNumber] => 42
//     )
function generateCollectTwoRandomNumbers()
{
    $result = [];
    $result['firstNumber'] = rand(1, 50);
    $result['secondNumber'] = rand(1, 50);
    return $result;
}

// add sign to array of number;
function addRandomSignToExpression($expression)
{
    $expression['sign'] = randomSign();
    return $expression;
}

// принимает массив типа
//     Array
//     (
//         [firstNumber] => 25
//         [sign] => +
//         [secondNumber] => 42
//     )
// return => 25 + 42 возвращает результат выражения
function countExpression($expression)
{
    if ($expression['sign'] == '+') {
        return $expression['firstNumber'] + $expression['secondNumber'];
    } elseif ($expression['sign'] == '-') {
        return $expression['firstNumber'] - $expression['secondNumber'];
    } else {
        return $expression['firstNumber'] * $expression['secondNumber'];
    }
}

// generate expression
function generateExpression()
{
    $collect = generateCollectTwoRandomNumbers();
    return addRandomSignToExpression($collect);
}

//generate array of three array numbers
function generateCollectExpressions()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateExpression();
    }
    return $result;
}

// expression array to string
//     Array
//     (
//         [firstNumber] => 'firstNumber'
//         [sign] => 'sign'
//         [secondNumber] => 'secondNumber'
//     )
//   return =>  "'firstNumber''sign' 'secondNumber'"
function expressionToString($arr)
{
    return "{$arr['firstNumber']} {$arr['sign']} {$arr['secondNumber']}";
}

// array string expression
function collectStringExpressions($collectExpressions)
{
    $result = [];
    foreach ($collectExpressions as $expression) {
        $result[] = expressionToString($expression);
    }
    return $result;
}

// array correct answer
function collectCorrectAnswers($collectExpressions)
{
    $result = [];
    foreach ($collectExpressions as $expression) {
        $result[] = countExpression($expression);
    }
    return $result;
}

// run calc game
function runCalcGame()
{
    $generateCollectExpressions = generateCollectExpressions();

    $collectQuestions = collectStringExpressions($generateCollectExpressions);
    $collectCorrectAnswers = collectCorrectAnswers($generateCollectExpressions);

    $combineQuestiosAndCorrectAnswers = array_combine($collectQuestions, $collectCorrectAnswers);

    runEngine($combineQuestiosAndCorrectAnswers, "What is the result of the expression?\n");
}
