<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expressionToString;
use function BrainGames\General\generateTwoRandomNumber;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;
use function BrainGames\General\printCorrect;
use function BrainGames\General\printWrongAnswer;
use function BrainGames\General\countResult;

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



// корректный ли ответ?
function compareAnswer($userAnswer, $expressionResult, $userName)
{
    if ($userAnswer != $expressionResult) {
        printWrongAnswer($userAnswer, $expressionResult, $userName);
    } else {
        return printCorrect();
    }
}

// run calc game
function runCalcGame()
{
    $result = 0;

    // ask name user
    $userName = run("What is the result of the expression?\n");

    while (true) {
        //generate two Numbers in array
        $twoRandomNumber = generateTwoRandomNumber();

        // add sign to array exp
        $expression = addRandomSignToExpression($twoRandomNumber);

        //expression to string
        $expressionToString = expressionToString($expression);

        // ask question
        $userAnswer = askQuestion($expressionToString);

        // count result expression
        $expressionResult = countExpression($expression);

        // compare answer
        $compareAnswer = compareAnswer($userAnswer, $expressionResult, $userName);

        // conunt result
        $result += countResult($compareAnswer);

        // Congratulations
        myCongratz($userName, $result);
    }
}
