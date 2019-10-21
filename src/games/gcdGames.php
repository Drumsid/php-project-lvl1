<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expressionToString;
use function BrainGames\General\generateTwoRandomNumber;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

// find gcd
function findGcd($arr)
{
    while ($arr['firstNumber'] != $arr['secondNumber']) {
        if ($arr['firstNumber'] > $arr['secondNumber']) {
            $arr['firstNumber'] -= $arr['secondNumber'];
        } else {
            $arr['secondNumber'] -= $arr['firstNumber'];
        }
    }
    return $arr['firstNumber'];
}

// add space sign
function addSpaseSign($arr)
{
    $arr['sign'] = "";
    return $arr;
}

// generate gcd expression
function generateGcdExpression()
{
    $twoRandomNumbers = generateTwoRandomNumber();
    return addSpaseSign($twoRandomNumbers);
}

//generate array of three array gcd expression
function generateThreeGcdExpressions()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateGcdExpression();
    }
    return $result;
}

// array of gcd expression
function threeGcdExpressionsToString($generateGcdExpressions)
{
    $result = [];
    foreach ($generateGcdExpressions as $gcdExpression) {
        $result[] = expressionToString($gcdExpression);
    }
    return $result;
}

// array  of correct gcd answer
function correctGcdAnswers($generateGcdExpressions)
{
    $result = [];
    foreach ($generateGcdExpressions as $gcdExpression) {
        $result[] = findGcd($gcdExpression);
    }
    return $result;
}


function runGcdGame()
{
    $generateThreeGcdExpressions = generateThreeGcdExpressions();

    $gcdExpressions = threeGcdExpressionsToString($generateThreeGcdExpressions);
    $correctGcdAnswers = correctGcdAnswers($generateThreeGcdExpressions);

    $combineGcdExpressionsAndCorrectAnswers = array_combine($gcdExpressions, $correctGcdAnswers);

    runEngine($combineGcdExpressionsAndCorrectAnswers, "Find the greatest common divisor of given numbers.\n");
}
