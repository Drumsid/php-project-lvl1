<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expressionToString;
use function BrainGames\General\generateTwoRandomNumber;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;

// find fgcd
function gcd($arr)
{
    while ($arr['firstNumber'] != $arr['secondNumber']) {
        if ($arr['firstNumber'] > $arr['secondNumber']) {
            $arr['firstNumber'] -= $arr['secondNumber'];
        } else {
            $arr['secondNumber'] -= $arr['firstNumber'];
        }
    }
    return $arr['firstNumber'];
}

// add space sign
function addSpaseSign($arr)
{
    $arr['sign'] = "";
    return $arr;
}

// is correct answer?
function isCorrectAnswer($userAnswer, $corectAnswer, $userName)
{
    if ($userAnswer != $corectAnswer) {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$corectAnswer}. Let's try again, {$userName}!");
        die;
    } else {
        line("Correct!");
        return 1;
    }
}

//run gcd game
function runGcdGame()
{
    $result = "";

    $welcome = "Welcome to the Brain Games!\nFind the greatest common divisor of given numbers.\n";

    // ask name user
    $userName = run($welcome);

    while (true) {
        //generate Num array
        $twoRandomNumber = generateTwoRandomNumber();

        // add space
        $expression = addSpaseSign($twoRandomNumber);

        //exp to string
        $expressionToString = expressionToString($expression);

        // ask question
        $userAnswer = askQuestion($expressionToString);

        //is correct answer
        $corectAnswer = gcd($twoRandomNumber);

        //is correct answer?
        $compareAnswer = isCorrectAnswer($userAnswer, $corectAnswer, $userName);

        if ($compareAnswer == 1) {
            $result++;
        }

        // Congratulations
        if ($result == 3) {
            myCongratz($userName);
        }
    }
}
