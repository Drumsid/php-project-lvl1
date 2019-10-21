<?php

namespace BrainGames\General;

use function cli\line;
use function cli\prompt;

// Welcome
function welcomToGame($welcome)
{
    line("Welcome to the Brain Games!\n{$welcome}\n");
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);
    return $userName;
}

//run engine The game
function runEngine($arrayCombine, $welcome)
{
     $userName = welcomToGame($welcome);
     //run questions
    foreach ($arrayCombine as $question => $correctAnswer) {
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.Let's try again, {$userName}!");
            die();
        }
    }
    line("Congratulations, %s!", $userName);
}

// ================================================================================

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
