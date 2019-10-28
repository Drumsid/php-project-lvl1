<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;
use const BrainGames\general\GAME_ROUNDS;

define("GAME_RULES_CALCULATOR", "What is the result of the expression?\n");

// random znak
function randomSign($sign)
{
    $random = rand(0, count($sign) - 1);
    return $sign[$random];
}
// $sign = ['+', '-', '*']; если тут оставить снифер ругается

/**
 * generate two random integer
 *
 * @return array
 * @author Denis
 */
function generateQuestionAndAnswer()
{
    $expression = [];
    $sign = ['+', '-', '*'];
    $expression['firstNumber'] = rand(1, 50);
    $expression['secondNumber'] = rand(1, 50);
    $expression['sign'] = randomSign($sign);

    $result = [];
    $correctAnswer = countExpression($expression);
    $result['question'] = expressionToString($expression);
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

function expressionToString($expression)
{
    return "{$expression['firstNumber']} {$expression['sign']} {$expression['secondNumber']}";
}

//generate array of three array numbers
function collectQuestionsAndAnswers($const)
{
    $result = [];
    for ($i = 0; $i < $const; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

// run calc game
function runCalcGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers(GAME_ROUNDS);

    runEngine($collectQuestionsAndAnswers, GAME_RULES_CALCULATOR);
}
