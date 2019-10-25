<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

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

function collectQuestionsAndAnswers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
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
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    runEngine($collectQuestionsAndAnswers, GAME_RULES_GCD);
}
