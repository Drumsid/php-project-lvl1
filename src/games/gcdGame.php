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

function generateGameData($roundsCount)
{
    $generateQuestionAndAnswer = function () {
        $collect = [];
        $firstValue = rand(1, 50);
        $secondValue = rand(1, 50);
        $correctGcd = findGcd($firstValue, $secondValue);
        $collect['question'] = "$firstValue $secondValue";
        $collect['correctAnswer'] = (string) $correctGcd;
        return $collect;
    };

    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = $generateQuestionAndAnswer();
    }
    return $result;
}

function runGcdGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);

    runEngine($gameData, GAME_RULE_GCD);
}
