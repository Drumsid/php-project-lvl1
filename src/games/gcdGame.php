<?php

namespace BrainGames\games\gcdGame;

use function BrainGames\general\runEngine;

use const BrainGames\general\ROUNDS_COUNT;

const GAME_RULE_GCD = "Find the greatest common divisor of given numbers.";

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
    $correctGcd = findGcd($firstValue, $secondValue);
    $result['question'] = "$firstValue $secondValue";
    $result['correctAnswer'] = (string) $correctGcd;
    return $result;
}

function generateCollectQuestionsAndAnswers($roundsCount)
{
    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runGcdGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(ROUNDS_COUNT);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_GCD);
}
