<?php

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;

define("GAME_RULES_EVEN", "Answer 'yes' if the number is even, otherwise answer 'no'.\n");

// генерирует число и проверяет положительное оно или нет, вернет массив [num, bool]
function generateQuestionAndAnswer()
{
    $result = [];
    $number = rand(1, 100);
    $evenOrNot = isEven($number);
    $result['question'] = $number;
    $result['correctAnswer'] = $evenOrNot === true ? 'yes' : 'no';
    return $result;
}

// проверяем положительное ли число
function isEven($number)
{
    if ($number % 2 == 0) {
        return true;
    }
    return false;
}

//generate array of three array nambers
function collectQuestionsAndAnswers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


function runEvenGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    runEngine($collectQuestionsAndAnswers, GAME_RULES_EVEN);
}
