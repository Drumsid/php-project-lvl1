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
    $arrExpression = generateTwoRandomNumber();
    return addSpaseSign($arrExpression);
}

//generate array of three array gcd expression
function generateArrayOfThreeGcdExpression()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateGcdExpression();
    }
    return $result;
}

// array of gcd expression
function arrayOfGcdExpression($generateGcdExpression)
{
    $result = [];
    foreach ($generateGcdExpression as $array) {
        $result[] = expressionToString($array);
    }
    return $result;
}

// array  of correct gcd answer
function arrayOfCorrectGcdAnswer($generateGcdExpression)
{
    $result = [];
    foreach ($generateGcdExpression as $array) {
        $result[] = findGcd($array);
    }
    return $result;
}


function runGcdGame()
{
    $generateGcdExpression = generateArrayOfThreeGcdExpression();

    $arrayGcdExpression = arrayOfGcdExpression($generateGcdExpression);
    $arrayGcdCorrect = arrayOfCorrectGcdAnswer($generateGcdExpression);

    $arrayCombine = array_combine($arrayGcdExpression, $arrayGcdCorrect);

    runEngine($arrayCombine, "Find the greatest common divisor of given numbers.\n");
}
