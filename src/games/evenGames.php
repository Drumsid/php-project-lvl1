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
function generateArrayOfThreeNumbers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateNumber();
    }
    return $result;
}

// sort array by key 
function sortByKey($ArrayOfThreeNumbers, $keySearchArray)
{ 
  $result = [];
  foreach ($ArrayOfThreeNumbers as $array) {
    foreach ($array as $key => $vol) {
      if ($key == $keySearchArray){
        $result[] = $vol;
      }
    }
  }
  return $result;
}


function runEvenGame()
{
    //generate array of three array numbers
    $arrayOfTreeNumbers = generateArrayOfThreeNumbers();

    $arrayNumber = sortByKey($arrayOfTreeNumbers, 'number');
    $arrayEven = sortByKey($arrayOfTreeNumbers, 'even');

    $arrayCombine = array_combine($arrayNumber, $arrayEven);

    runEngine($arrayCombine, "Answer 'yes' if the number is even, otherwise answer 'no'.\n");

}



