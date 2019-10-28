<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;

define("GAME_RULES_PRIME", "Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");

function isPrimeNumber($number)
{
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
    $number = rand(2, 100);
    $prime = isPrimeNumber($number);

    $result['question'] = $number;
    $result['correctAnswer'] = $prime === true ? 'yes' : 'no';
    return $result;
}

function collectQuestionsAndAnswers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


// run prime game
function runPrimeGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    runEngine($collectQuestionsAndAnswers, GAME_RULES_PRIME);
}
