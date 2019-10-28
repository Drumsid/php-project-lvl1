<?php

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;
use const BrainGames\general\GAME_ROUNDS;

define("GAME_RULES_EVEN", "Answer 'yes' if the number is even, otherwise answer 'no'.\n");

// генерирует число и проверяет положительное оно или нет, вернет массив [num, bool]
function generateQuestionAndAnswer()
{
    $result = [];
    $question = rand(1, 100);
    $result['question'] = $question;
    $result['correctAnswer'] = isEven($question) ? 'yes' : 'no';
    return $result;
}

// проверяем положительное ли число
function isEven($number)
{
    return $number % 2 == 0;
}

//generate array of three array nambers
function collectQuestionsAndAnswers($const)
{
    $result = [];
    for ($i = 0; $i < $const; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


function runEvenGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers(GAME_ROUNDS);

    runEngine($collectQuestionsAndAnswers, GAME_RULES_EVEN);
}
