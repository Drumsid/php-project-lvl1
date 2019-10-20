<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;
use function BrainGames\General\printCorrect;
use function BrainGames\General\printWrongAnswer;
use function BrainGames\General\countResult;

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
function compareAnswer($userAnswer, $primeNumber, $userName)
{
    $correctAnswer = boolToStr($primeNumber);
    if ($primeNumber === false && $userAnswer === 'no' || $primeNumber === true && $userAnswer === 'yes') {
        return printCorrect();
    } else {
        printWrongAnswer($userAnswer, $correctAnswer, $userName);
    }
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
    $result = 0;

    // ask name user
    $userName = run("Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");

    while (true) {
        // generate number
        $number = rand(2, 100);

        // is prime?
        $primeNumber = primeNumber($number);

        //ask question
        $userAnswer = askQuestion($number);

        //is correct answer?
        $compareAnswer = compareAnswer($userAnswer, $primeNumber, $userName);

        // conunt result
        $result += countResult($compareAnswer);

        // Congratulations
        myCongratz($userName, $result);
    }
}
