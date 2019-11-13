<?php

namespace BrainGames\games\calcGame;

use function BrainGames\general\runEngine;

use const BrainGames\general\ROUNDS_COUNT;

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

function generateGameData($roundsCount)
{
    $generateQuestionAndAnswer = function () {
        $firstValue = rand(1, 50);
        $secondValue = rand(1, 50);
        $mathSign = generateRandomSign(MATH_SIGNS);
        $collect = [];

        $correctAnswer = calculateExpression($firstValue, $secondValue, $mathSign);
        $collect['question'] = "{$firstValue} {$mathSign} {$secondValue}";
        $collect['correctAnswer'] = (string) $correctAnswer;
        return $collect;
    };

    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = $generateQuestionAndAnswer();
    }
    return $result;
}

function runCalcGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);

    runEngine($gameData, GAME_RULE_CALCULATOR);
}
