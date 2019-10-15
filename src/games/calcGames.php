<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expToString;
use function BrainGames\General\genNumArr;
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
function signExpression($arr)
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
function isCorrectAnswer($answer, $expResult, $name)
{
    // $expResult = countExp($exp);
    // $expStr = expToString($exp);
    if ($answer != $expResult) {
        // line("Question: {$expStr}");      // возможно не правильно понял тз, поэтому сделал такой вывод в консоль
        // line("Your answer: {$answer}");   // возможно не правильно понял тз, поэтому сделал такой вывод в консоль
        line("{$answer} is wrong answer ;(. Correct answer was {$expResult}. Let's try again, {$name}!");
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
    $name = run($welcome);

    while (true) {
        //generate Num array
        $expNum = genNumArr();

        // add sign to array exp
        $exp = signExpression($expNum);

        //expression to string
        $expToString = expToString($exp);

        // ask question
        $answer = askQuestion($expToString);

        // count result expression
        $expResult = countExp($exp);

        // compare answer
        $corectAnswer = isCorrectAnswer($answer, $expResult, $name);

        if ($corectAnswer == 1) {
            $result++;
        }

        // Congratulations
        if ($result == 3) {
            myCongratz($name);
        }
    }
}
