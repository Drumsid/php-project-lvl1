<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;

//is prime function
function is_prime($n)
{
    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x == 0) {
            return false;
        }
    }
    return true;
}

// задаем вопрос пользователю
function askQuestion($num)
{
    line("Question: {$num}");
    $answer = prompt("Your answer");
    return $answer;
}

// compare answer
function isCorrectAnswer($isPrime, $userAnswer, $name)
{
    $boolAnswer = boolToStr($isPrime);
    if ($isPrime === false && $userAnswer === 'no' || $isPrime === true && $userAnswer === 'yes') {
        line("Correct!");
        return 1;
    } elseif ($isPrime === false && $userAnswer !== 'no' || $isPrime === true && $userAnswer !== 'yes') {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$boolAnswer}. Let's try again, {$name}!");
        die();
    }
    // else {
    //     line("The answer can be only 'yes' or 'no'. Let's try again, {$name}!");
    // }
}

// bool in expToString
function boolToStr($num)
{
    if ($num === true) {
        return "yes";
    } else {
        return "no";
    }
}
