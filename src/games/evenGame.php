<?php

namespace BrainGames\games\evenGame;

use function BrainGames\general\runEngine;

use const BrainGames\general\ROUNDS_COUNT;

const GAME_RULE_EVEN = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function isEven($number)
{
    return $number % 2 == 0;
}

function generateGameData($roundsCount)
{
    $generateQuestionAndAnswer = function () {
        $collect = [];
        $question = rand(1, 100);
        $collect['question'] = $question;
        $collect['correctAnswer'] = isEven($question) ? 'yes' : 'no';
        return $collect;
    };

    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = $generateQuestionAndAnswer();
    }
    return $result;
}

function runEvenGame()
{
    $gameData = generateGameData(ROUNDS_COUNT);

    runEngine($gameData, GAME_RULE_EVEN);
}
