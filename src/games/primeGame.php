<?php

namespace BrainGames\games\primeGame;

use function BrainGames\general\runEngine;

const GAME_RULE_PRIME = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function isPrime($number)
{
    if (!is_int($number) || $number < 2) {
        return false;
    }
    for ($x = 2; $x <= sqrt($number); $x++) {
        if ($number % $x == 0) {
            return false;
        }
    }
    return true;
}

function runPrimeGame()
{
    $generateGameData = function () {
        $collect = [];
        $question = rand(2, 100);
        $collect['question'] = $question;
        $collect['correctAnswer'] = isPrime($question) ? 'yes' : 'no';
        return $collect;
  };

    runEngine($generateGameData, GAME_RULE_PRIME);
}
