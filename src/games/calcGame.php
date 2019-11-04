<?php

namespace BrainGames\games\calcGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\general\runEngine;

define("GAME_RULE_CALCULATOR", "What is the result of the expression?");
define('MATH_SIGNS', ['+', '-', '*']);

function generateRandomSign($sign)
{
    $random = rand(0, count($sign) - 1);
    return $sign[$random];
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
    $sign = generateRandomSign(MATH_SIGNS);

    $result = [];
    $correctAnswer = calculateExpression($firstValue, $secondValue, $sign);
    $result['question'] = "{$firstValue} {$sign} {$secondValue}";
    $result['correctAnswer'] = $correctAnswer;
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
function calculateExpression($firstValue, $secondValue, $sign)
{
    switch ($sign) {
        case "+":
            return $firstValue + $secondValue;
        case "-":
            return $firstValue - $secondValue;
        case "*":
            return $firstValue * $secondValue;
    }
}


function generateCollectQuestionsAndAnswers($gameRound)
{
    $result = [];
    for ($i = 0; $i < $gameRound; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runCalcGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUND);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_CALCULATOR);
}
