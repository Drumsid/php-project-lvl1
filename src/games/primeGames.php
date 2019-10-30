<?php

namespace BrainGames\primeGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;

use const BrainGames\general\GAME_ROUNDS;

define("GAME_RULE_PRIME", "Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");

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
    $question = rand(2, 100);
    $result['question'] = $question;
    $result['correctAnswer'] = isPrimeNumber($question) ? 'yes' : 'no';
    return $result;
}

function generateCollectQuestionsAndAnswers($const)
{
    $result = [];
    for ($i = 0; $i < $const; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


// run prime game
function runPrimeGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUNDS);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_PRIME);
}
