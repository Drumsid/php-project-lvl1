<?php

namespace BrainGames\games\gcdGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\general\runEngine;

define("GAME_RULE_GCD", "Find the greatest common divisor of given numbers.");

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
    $result['question'] = "{$firstValue} {$secondValue}";
    $result['correctAnswer'] = $findGcd;
    return $result;
}

function generateCollectQuestionsAndAnswers($gameRound)
{
    $result = [];
    for ($i = 0; $i < $gameRound; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


function runGcdGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUND);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_GCD);
}
