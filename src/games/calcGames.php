<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expressionToString;
use function BrainGames\General\generateTwoRandomNumber;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;

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
function isCorrectAnswer($userAnswer, $expressionResult, $userName)
{
    // $expressionResult = countExpression($exp);
    // $expStr = expressionToString($exp);
    if ($userAnswer != $expressionResult) {
        // line("Question: {$expStr}");      // возможно не правильно понял тз, поэтому сделал такой вывод в консоль
        // line("Your answer: {$userAnswer}");   // возможно не правильно понял тз, поэтому сделал такой вывод в консоль
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$expressionResult}. Let's try again, {$userName}!");
        die;
    } else {
        line("Correct!");
        return 1;
    }
}

// run calc game
function runCalcGame()
{
    $result = "";

    $welcome = "Welcome to the Brain Games!\nWhat is the result of the expression?\n";

    // ask name user
    $userName = run($welcome);

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
        $corectAnswer = isCorrectAnswer($userAnswer, $expressionResult, $userName);

        if ($corectAnswer == 1) {
            $result++;
        }

        // Congratulations
        if ($result == 3) {
            myCongratz($userName);
        }
    }
}
