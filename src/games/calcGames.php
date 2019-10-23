<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

define("GAME_RULES_CALCULATOR", "What is the result of the expression?\n");

// random znak
function randomSign($sign)
{
    $random = rand(0, count($sign) - 1);
    return $sign[$random];
}
// $sign = ['+', '-', '*']; тут оставить если снифер ругается

/**
 * generate two random integer
 *
 * @return array
 * @author Denis
 */
function generateExpression()
{
    $result = [];
    $sign = ['+', '-', '*'];
    $result['firstNumber'] = rand(1, 50);
    $result['secondNumber'] = rand(1, 50);
    $result['sign'] = randomSign($sign);
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
function countExpression($expression)
{
    if ($expression['sign'] == '+') {
        return $expression['firstNumber'] + $expression['secondNumber'];
    } elseif ($expression['sign'] == '-') {
        return $expression['firstNumber'] - $expression['secondNumber'];
    } else {
        return $expression['firstNumber'] * $expression['secondNumber'];
    }
}

//generate array of three array numbers
function generateCollectExpressions()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateExpression();
    }
    return $result;
}

/**
 * Convert expression to string
 *
 *@param array $expression
 *
 * @return string
 * @author Denis
 */
function expressionToString($arr)
{
    return "{$arr['firstNumber']} {$arr['sign']} {$arr['secondNumber']}";
}

// array string expression
function collectStringExpressions($collectExpressions)
{
    $result = [];
    foreach ($collectExpressions as $expression) {
        $result[] = expressionToString($expression);
    }
    return $result;
}

// array correct answer
function collectCorrectAnswers($collectExpressions)
{
    $result = [];
    foreach ($collectExpressions as $expression) {
        $result[] = countExpression($expression);
    }
    return $result;
}

// run calc game
function runCalcGame()
{
    $generateCollectExpressions = generateCollectExpressions();

    $collectQuestions = collectStringExpressions($generateCollectExpressions);
    $collectCorrectAnswers = collectCorrectAnswers($generateCollectExpressions);

    $combineQuestiosAndCorrectAnswers = array_combine($collectQuestions, $collectCorrectAnswers);

    runEngine($combineQuestiosAndCorrectAnswers, GAME_RULES_CALCULATOR);
}
