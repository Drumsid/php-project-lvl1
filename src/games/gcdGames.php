<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;

define("GAME_RULE_GCD", "Find the greatest common divisor of given numbers.\n");

function findGcd($firstValue, $secondValue)
{
    while ($firstValue != $secondValue) {
        if ($firstValue > $secondValue) {
            $firstValue -= $secondValue;
        } else {
            $secondValue -= $firstValue;
        }
    }
    return $firstValue;
}

function generateQuestionAndAnswer()
{
    $result = [];
    $firstValue = rand(1, 50);
    $secondValue = rand(1, 50);
    $findGcd = findGcd($firstValue, $secondValue);
    $result['question'] = expressionToString($firstValue, $secondValue);
    $result['correctAnswer'] = $findGcd;
    return $result;
}

function generateCollectQuestionsAndAnswers($const)
{
    $result = [];
    for ($i = 0; $i < $const; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function expressionToString($firstValue, $secondValue)
{
    return "{$firstValue} {$secondValue}";
}

function runGcdGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUNDS);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_GCD);
}
