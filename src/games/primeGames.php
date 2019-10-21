<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

//is prime function
function primeNumber($n)
{
    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x == 0) {
            return 'no';
        }
    }
    return 'yes';
}

//generate three numbers
function generateThreeRandomNumbers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = rand(2, 100);
    }
    return $result;
}

//generate correct answer prime
function arrayOfCorrectPrimeAnswer($generateThreeRandomNumbers)
{
  $result = [];
  foreach ($generateThreeRandomNumbers as $array) {
    $result[] = primeNumber($array);
  }
  return $result;
}

// run prime game
function runPrimeGame()
{
    $generateThreeRandomNumbers = generateThreeRandomNumbers();   
    
    $arrayOfCorrectPrimeAnswer = arrayOfCorrectPrimeAnswer($generateThreeRandomNumbers);

    $arrayCombine = array_combine($generateThreeRandomNumbers, $arrayOfCorrectPrimeAnswer);

    runEngine($arrayCombine, "Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");
}
