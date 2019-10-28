<?php

namespace BrainGames\progressionGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\runEngine;

define("GAME_RULES_PROGRESSION", "What number is missing in the progression?\n");

//generate array of random progression numbers
function generateRandomProgression()
{
    $result = [];

    $generateCountStep = rand(2, 5);

    $generateStartNumber = rand(1, 10);

    for ($i = 0, $step = $generateStartNumber; $i < 10; $i++) {
        if ($i == 0) {
            $result[] = $step;
        } else {
            $step += $generateCountStep;
            $result[] = $step;
        }
    }
    return $result;
}

// hide random number in array of random progression numbers
function generateRandomHideNumber($generateProgression)
{
    $result = [];
    $generateRandomHideNumber = [];
    $randomHideKey = rand(1, 8);

    foreach ($generateProgression as $k => $v) {
        if ($k == $randomHideKey) {
            $generateRandomHideNumber[] = "..";
        } else {
            $generateRandomHideNumber[] = $v;
        }
    }

    $result['question'] = implode(" ", $generateRandomHideNumber);
    $result['correctAnswer'] = $generateProgression[$randomHideKey];

    return $result;
}

// genirate progression
function generateQuestionAndAnswer()
{
    $generateRandomProgression = generateRandomProgression();

    return generateRandomHideNumber($generateRandomProgression);
}

//generate random progression array
function collectQuestionsAndAnswers()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


function runProgressionGame()
{
    $collectQuestionsAndAnswers = collectQuestionsAndAnswers();

    runEngine($collectQuestionsAndAnswers, GAME_RULES_PROGRESSION);
}
