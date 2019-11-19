<?php

namespace BrainGames\games\even;

use function BrainGames\general\runEngine;

const GAME_RULE_EVEN = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function isEven($number)
{
    return $number % 2 == 0;
}

function runEvenGame()
{
    $generateGameData = function () {
        $gameData = [];
        $question = rand(1, 100);
        $gameData['question'] = $question;
        $gameData['correctAnswer'] = isEven($question) ? 'yes' : 'no';
        return $gameData;
    };
    runEngine($generateGameData, GAME_RULE_EVEN);
}
