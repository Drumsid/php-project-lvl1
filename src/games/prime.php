<?php

namespace BrainGames\games\prime;

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
        $gameData = [];
        $question = rand(2, 100);
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = isPrime($question) ? 'yes' : 'no';
        return $gameData;
    };

    runEngine($generateGameData, GAME_RULE_PRIME);
}
