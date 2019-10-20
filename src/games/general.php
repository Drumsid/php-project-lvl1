<?php

namespace BrainGames\General;

use function cli\line;
use function cli\prompt;

// Welcome
function run($welcome)
{
    line("Welcome to the Brain Games!\n{$welcome}\n");
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);
    return $userName;
}


// welcom game
function welcomGame()
{
    $welcome = "Welcome to the Brain Games!\n";

    run($welcome);
}

// generate two random integer
// return
//     Array
//     (
//         [firstNumber] => 25
//         [secondNumber] => 42
//     )
function generateTwoRandomNumber()
{
    $res = [];
    $res['firstNumber'] = rand(1, 50);
    $res['secondNumber'] = rand(1, 50);
    return $res;
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

// задаем вопрос пользователю
function askQuestion($val)
{
    // $strExp = expressionToString($arr);
    line("Question: {$val}");
    $userAnswer = prompt("Your answer");
    return $userAnswer;
}

//print Correct!
function printCorrect()
{
    line("Correct!");
    return 1;
}

//print wrong answer!
function printWrongAnswer($userAnswer, $evenOrNot, $userName)
{
    line("{$userAnswer} is wrong answer ;(. Correct answer was {$evenOrNot}. Let's try again, {$userName}!");
    die;
}

//count result
function countResult($compareAnswer)
{
    if ($compareAnswer == 1) {
        return 1;
    }
}

// Congratulations
function myCongratz($userName, $result)
{
    if ($result == 3) {
        line("Congratulations, %s!", $userName);
        die;
    }
}
