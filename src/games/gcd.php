<?php

namespace BrainGames\games\gcd;

use function BrainGames\general\runEngine;

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

function runGcdGame()
{
    $generateGameData = function () {
        $gameData = [];
        $firstValue = rand(1, 50);
        $secondValue = rand(1, 50);
        $correctGcd = findGcd($firstValue, $secondValue);
        $gameData['question'] = "$firstValue $secondValue";
        $gameData['correctAnswer'] = (string) $correctGcd;
        return $gameData;
    };

    runEngine($generateGameData, GAME_RULE_GCD);
}
