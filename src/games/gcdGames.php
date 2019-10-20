<?php

namespace BrainGames\gcdGames;

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
function compareAnswer($userAnswer, $corectAnswer, $userName)
{
    if ($userAnswer != $corectAnswer) {
        printWrongAnswer($userAnswer, $corectAnswer, $userName);
    } else {
        return printCorrect();
    }
}

//run gcd game
function runGcdGame()
{
    $result = 0;

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
        $compareAnswer = compareAnswer($userAnswer, $corectAnswer, $userName);

        // conunt result
        $result += countResult($compareAnswer);

        // Congratulations
        myCongratz($userName, $result);
    }
}
