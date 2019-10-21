<?php

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;
use function BrainGames\General\myCongratz;

// генерирует число и проверяет положительное оно или нет, вернет массив [num, bool]
function generateNumber()
{
    $result = [];
    $number = rand(1, 100);
    $yesOrNo = isEven($number);
    $result['number'] = $number;
    $result['even'] = $yesOrNo;
    return $result;
}

// проверяем положительное ли число
function isEven($number)
{
    if ($number % 2 == 0) {
        return 'yes';
    }
    return 'no';
}

//generate array of three array nambers
function generateThreeNumbers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateNumber();
    }
    return $result;
}

// sort array by key
function sortByKey($threeNumbers, $keySearch)
{
    $result = [];
    foreach ($threeNumbers as $number) {
        foreach ($number as $key => $vol) {
            if ($key == $keySearch) {
                $result[] = $vol;
            }
        }
    }
    return $result;
}


function runEvenGame()
{
    //generate array of three array numbers
    $threeNumbers = generateThreeNumbers();

    $numbers = sortByKey($threeNumbers, 'number');
    $evens = sortByKey($threeNumbers, 'even');

    $combineNumbersAndCorrectAnswers = array_combine($numbers, $evens);

    runEngine($combineNumbersAndCorrectAnswers, "Answer 'yes' if the number is even, otherwise answer 'no'.\n");
}
