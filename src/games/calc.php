<?php

namespace BrainGames\games\calc;

use function BrainGames\general\runEngine;

const GAME_RULE_CALCULATOR = "What is the result of the expression?";
const MATH_SIGNS = ['+', '-', '*'];

function generateRandomSign($mathSigns)
{
    return $mathSigns[array_rand($mathSigns)];
}

/**
 * Count expression
 *
 *@param array $expression
 *
 * @return int
 * @author Denis
 */
function calculateExpression($firstValue, $secondValue, $mathSign)
{
    switch ($mathSign) {
        case "+":
            return $firstValue + $secondValue;
        case "-":
            return $firstValue - $secondValue;
        case "*":
            return $firstValue * $secondValue;
    }
}

function runCalcGame()
{
    $generateGameData = function () {
        $firstValue = rand(1, 50);
        $secondValue = rand(1, 50);
        $mathSign = generateRandomSign(MATH_SIGNS);
        $gameData = [];

        $correctAnswer = calculateExpression($firstValue, $secondValue, $mathSign);
        $gameData['question'] = "{$firstValue} {$mathSign} {$secondValue}";
        $gameData['correctAnswer'] = (string) $correctAnswer;
        return $gameData;
    };

    runEngine($generateGameData, GAME_RULE_CALCULATOR);
}
