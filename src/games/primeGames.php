<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;

define("GAME_RULES_PRIME", "Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");

//is prime function
function isPrimeNumber($number)
{
    for ($x = 2; $x <= sqrt($number); $x++) {
        if ($number % $x == 0) {
            return false;
        }
    }
    return true;
}

function collectQuestionsAndAnswers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $number = rand(2, 100);
        $prime = isPrimeNumber($number);
        $result[$number] = $prime === true ? 'yes' : 'no';
    }
    return $result;
}

// run prime game
function runPrimeGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    runEngine($collectQuestionsAndAnswers, GAME_RULES_PRIME);
}
