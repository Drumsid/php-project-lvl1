<?php

namespace BrainGames\games\calcGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\general\runEngine;

define("GAME_RULE_CALCULATOR", "What is the result of the expression?\n");
define('SIGNS', ['+', '-', '*']);

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
    $sign = generateRandomSign(SIGNS);

    $result = [];
    $correctAnswer = countExpression($firstValue, $secondValue, $sign);
    $result['question'] = expressionToString($firstValue, $secondValue, $sign);
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
function countExpression($firstValue, $secondValue, $sign)
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

function expressionToString($firstValue, $secondValue, $sign)
{
    return "{$firstValue} {$sign} {$secondValue}";
}

function generateCollectQuestionsAndAnswers($const)
{
    $result = [];
    for ($i = 0; $i < $const; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runCalcGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUNDS);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_CALCULATOR);
}
