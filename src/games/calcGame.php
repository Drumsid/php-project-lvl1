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
 * generate two random integer
 *
 * @return array
 * @author Denis
 */
function generateQuestionAndAnswer()
{
    $firstValue = rand(1, 50);
    $secondValue = rand(1, 50);
    $mathSign = generateRandomSign(MATH_SIGNS);

    $result = [];
    $correctAnswer = calculateExpression($firstValue, $secondValue, $mathSign);
    $result['question'] = "{$firstValue} {$mathSign} {$secondValue}";
    $result['correctAnswer'] = (string) $correctAnswer;
    return $result;
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

function generateCollectQuestionsAndAnswers($roundsCount)
{
    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runCalcGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(ROUNDS_COUNT);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_CALCULATOR);
}
