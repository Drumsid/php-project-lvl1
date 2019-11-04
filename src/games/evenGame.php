<?php

namespace BrainGames\games\evenGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\general\runEngine;

define("GAME_RULE_EVEN", "Answer 'yes' if the number is even, otherwise answer 'no'.");

function generateQuestionAndAnswer()
{
    $result = [];
    $question = rand(1, 100);
    $result['question'] = $question;
    $result['correctAnswer'] = isEven($question) ? 'yes' : 'no';
    return $result;
}

function isEven($number)
{
    return $number % 2 == 0;
}

function generateCollectQuestionsAndAnswers($gameRound)
{
    $result = [];
    for ($i = 0; $i < $gameRound; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


function runEvenGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUND);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_EVEN);
}
