<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

//is prime function
function isPrimeNumber($number)
{
    for ($x = 2; $x <= sqrt($number); $x++) {
        if ($number % $x == 0) {
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
function correctPrimeAnswers($generateThreeRandomNumbers)
{
    $result = [];
    foreach ($generateThreeRandomNumbers as $number) {
        $result[] = isPrimeNumber($number);
    }
    return $result;
}

// run prime game
function runPrimeGame()
{
    $generateThreeRandomNumbers = generateThreeRandomNumbers();

    $collectCorrectAnswers = correctPrimeAnswers($generateThreeRandomNumbers);

    $combineQuestiosAndCorrectAnswers = array_combine($generateThreeRandomNumbers, $collectCorrectAnswers);

    runEngine($combineQuestiosAndCorrectAnswers, "Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");
}
