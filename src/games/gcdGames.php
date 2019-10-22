<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
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

// generate two random integer
// return
//     Array
//     (
//         [firstNumber] => 25
//         [secondNumber] => 42
//     )
function generateCollectTwoRandomNumbers()
{
    $result = [];
    $result['firstNumber'] = rand(1, 50);
    $result['secondNumber'] = rand(1, 50);
    return $result;
}

// generate gcd expression
function generateGcdExpression()
{
    $collect = generateCollectTwoRandomNumbers();
    return addSpaseSign($collect);
}

//generate array of three array gcd expression
function generateGcdExpressions()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateGcdExpression();
    }
    return $result;
}

// expression array to string
//     Array
//     (
//         [firstNumber] => 'firstNumber'
//         [sign] => 'sign'
//         [secondNumber] => 'secondNumber'
//     )
//   return =>  "'firstNumber''sign' 'secondNumber'"
function expressionToString($arr)
{
    return "{$arr['firstNumber']} {$arr['sign']} {$arr['secondNumber']}";
}


// array of gcd expression
function gcdExpressionsToString($collectGcdExpressions)
{
    $result = [];
    foreach ($collectGcdExpressions as $gcdExpression) {
        $result[] = expressionToString($gcdExpression);
    }
    return $result;
}

// array  of correct gcd answer
function correctGcdAnswers($collectGcdExpressions)
{
    $result = [];
    foreach ($collectGcdExpressions as $gcdExpression) {
        $result[] = findGcd($gcdExpression);
    }
    return $result;
}


function runGcdGame()
{
    $collectGcdExpressions = generateGcdExpressions();

    $collectQuestions = gcdExpressionsToString($collectGcdExpressions);
    $collectCorrectAnswers = correctGcdAnswers($collectGcdExpressions);

    $combineQuestiosAndCorrectAnswers = array_combine($collectQuestions, $collectCorrectAnswers);

    runEngine($combineQuestiosAndCorrectAnswers, "Find the greatest common divisor of given numbers.\n");
}
