<?php

namespace BrainGames\calcGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expressionToString;
use function BrainGames\General\generateTwoRandomNumber;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

// random znak
function randomSign()
{
    $sign = ['+', '-', '*'];
    $random = rand(0, 2);
    return $sign[$random];
}


// add sign to array of number;
function addRandomSignToExpression($arr)
{
    $arr['sign'] = randomSign();
    return $arr;
}

// принимает массив типа
//     Array
//     (
//         [firstNumber] => 25
//         [sign] => +
//         [secondNumber] => 42
//     )
// return => 25 + 42 возвращает результат выражения
function countExpression($arr)
{
    if ($arr['sign'] == '+') {
        return $arr['firstNumber'] + $arr['secondNumber'];
    } elseif ($arr['sign'] == '-') {
        return $arr['firstNumber'] - $arr['secondNumber'];
    } else {
        return $arr['firstNumber'] * $arr['secondNumber'];
    }
}

// generate expression
function generateExpression()
{
  $arrExp = generateTwoRandomNumber();
  return addRandomSignToExpression($arrExp);
}

//generate array of three array numbers
function generateArrayOfThreeExpression()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateExpression();
    }
    return $result;
}

// array string expression
function arrayOfStringExpression($arrayExpression)
{
  $result = [];
  foreach ($arrayExpression as $array) {
    $result[] = expressionToString($array);
  }
  return $result;
}

// array correct answer
function arrayOfCorrectAnswer($arrayExpression)
{
  $result = [];
  foreach ($arrayExpression as $array) {
    $result[] = countExpression($array);
  }
  return $result;
}

// run calc game
function runCalcGame()
{
    $generateArrayOfThreeNumbers = generateArrayOfThreeExpression();

    $arrayExpression = arrayOfStringExpression($generateArrayOfThreeNumbers);
    $arrayCorrect = arrayOfCorrectAnswer($generateArrayOfThreeNumbers);

    $arrayCombine = array_combine($arrayExpression, $arrayCorrect);

    runEngine($arrayCombine, "What is the result of the expression?\n");
}

