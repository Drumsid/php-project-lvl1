<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;
use const BrainGames\general\GAME_ROUNDS;

define("GAME_RULES_GCD", "Find the greatest common divisor of given numbers.\n");

function findGcd($firstInt, $secondInt)
{
    while ($firstInt != $secondInt) {
        if ($firstInt > $secondInt) {
            $firstInt -= $secondInt;
        } else {
            $secondInt -= $firstInt;
        }
    }
    return $firstInt;
}

function generateQuestionAndAnswer()
{
    $expression = [];
    $firstInt = rand(1, 50);
    $secondInt = rand(1, 50);
    $findGcd = findGcd($firstInt, $secondInt);

    $result = [];
    $expression['firstNumber'] = $firstInt;
    $expression['secondNumber'] = $secondInt;
    $result['question'] = expressionToString($expression);
    $result['correctAnswer'] = $findGcd;
    return $result;
}

function collectQuestionsAndAnswers($const)
{
    $result = [];
    for ($i = 0; $i < $const; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function expressionToString($arr)
{
    return "{$arr['firstNumber']} {$arr['secondNumber']}";
}

function runGcdGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers(GAME_ROUNDS);

    runEngine($collectQuestionsAndAnswers, GAME_RULES_GCD);
}
