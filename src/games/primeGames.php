<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;

//is prime function
function primeNumber($n)
{
    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x == 0) {
            return false;
        }
    }
    return true;
}



// compare answer
function isCorrectAnswer($primeNumber, $userAnswer, $userName)
{
    $correctAnswer = boolToStr($primeNumber);
    if ($primeNumber === false && $userAnswer === 'no' || $primeNumber === true && $userAnswer === 'yes') {
        line("Correct!");
        return 1;
    } elseif ($primeNumber === false && $userAnswer !== 'no' || $primeNumber === true && $userAnswer !== 'yes') {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}. Let's try again, {$userName}!");
        die();
    }
    // else {
    //     line("The answer can be only 'yes' or 'no'. Let's try again, {$userName}!");
    // }
}

// bool in expressionToString
function boolToStr($num)
{
    if ($num === true) {
        return "yes";
    } else {
        return "no";
    }
}

// run prime game
function runPrimeGame()
{
    $result = "";

    $welcome = "Welcome to the Brain Games!\nAnswer 'yes' if given number is prime. Otherwise answer 'no'.\n";

    // ask name user
    $userName = run($welcome);

    while (true) {
        // generate number
        $number = rand(2, 100);

        // is prime?
        $primeNumber = primeNumber($number);

        //ask question
        $userAnswer = askQuestion($number);

        //is correct answer?
        $compareAnswer = isCorrectAnswer($primeNumber, $userAnswer, $userName);

        if ($compareAnswer == 1) {
            $result++;
        }

        // Congratulations
        if ($result == 3) {
            myCongratz($userName);
        }
    }
}
