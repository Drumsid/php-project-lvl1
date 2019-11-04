<?php

namespace BrainGames\games\primeGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\general\runEngine;

define("GAME_RULE_PRIME", "Answer 'yes' if given number is prime. Otherwise answer 'no'.");

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

function generateQuestionAndAnswer()
{
    $result = [];
    $question = rand(2, 100);
    $result['question'] = $question;
    $result['correctAnswer'] = isPrime($question) ? 'yes' : 'no';
    return $result;
}

function generateCollectQuestionsAndAnswers($gameRound)
{
    $result = [];
    for ($i = 0; $i < $gameRound; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runPrimeGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUND);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_PRIME);
}
