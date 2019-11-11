<?php

namespace BrainGames\games\evenGame;

use function BrainGames\general\runEngine;

use const BrainGames\general\ROUNDS_COUNT;

const GAME_RULE_EVEN = "Answer 'yes' if the number is even, otherwise answer 'no'.";

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

function generateCollectQuestionsAndAnswers($roundsCount)
{
    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runEvenGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(ROUNDS_COUNT);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_EVEN);
}
