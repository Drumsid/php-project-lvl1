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
    $result = [];
    $firstInt = rand(1, 50);
    $secondInt = rand(1, 50);
    $findGcd = findGcd($firstInt, $secondInt);
    $result['firstNumber'] = $firstInt;
    $result['secondNumber'] = $secondInt;
    $result['gcd'] = $findGcd;
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

function gcdExpressionsToString($collectGcdExpressions)
{
    $result = [];
    foreach ($collectGcdExpressions as $gcdExpression) {
        $result[] = expressionToString($gcdExpression);
    }
    return $result;
}

function correctGcdAnswers($collectGcdExpressions)
{
    $result = [];
    foreach ($collectGcdExpressions as $gcdExpression) {
        $result[] = $gcdExpression['gcd'];
    }
    return $result;
}

function runGcdGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    $collectQuestions = gcdExpressionsToString($collectQuestionsAndAnswers);
    $collectCorrectAnswers = correctGcdAnswers($collectQuestionsAndAnswers);

    $combineQuestiosAndCorrectAnswers = array_combine($collectQuestions, $collectCorrectAnswers);

    runEngine($combineQuestiosAndCorrectAnswers, GAME_RULES_GCD);
}
