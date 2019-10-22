<?php

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;
use function BrainGames\General\myCongratz;

// генерирует число и проверяет положительное оно или нет, вернет массив [num, bool]
function generateQuestionAndAnswer()
{
    $result = [];
    $number = rand(1, 100);
    $evenOrNot = isEven($number);
    $result['number'] = $number;
    $result['even'] = $evenOrNot;
    return $result;
}

// проверяем положительное ли число
function isEven($number)
{
    if ($number % 2 == 0) {
        return 'yes';
    }
    return 'no';
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

// sort array by key
function sortByKey($collectQuestionsAndAnswers, $keySearch)
{
    $result = [];
    foreach ($collectQuestionsAndAnswers as $collection) {
        foreach ($collection as $key => $vol) {
            if ($key == $keySearch) {
                $result[] = $vol;
            }
        }
    }
    return $result;
}


function runEvenGame()
{
    //generate array of three array numbers
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    $collectQuestions = sortByKey($collectQuestionsAndAnswers, 'number');
    $collectAnswers = sortByKey($collectQuestionsAndAnswers, 'even');

    $combineQuestiosAndCorrectAnswers = array_combine($collectQuestions, $collectAnswers);

    runEngine($combineQuestiosAndCorrectAnswers, "Answer 'yes' if the number is even, otherwise answer 'no'.\n");
}
