<?php

namespace BrainGames\games\progressionGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\general\general\runEngine;

define("GAME_RULE_PROGRESSION", "What number is missing in the progression?");
define("COUNT_PROGRESSION", 10);

function generateRandomProgression($count)
{
    $result = [];

    $generateCountStep = rand(2, 5);

    $generateStartNumber = rand(1, 10);

    for ($i = 0, $step = $generateStartNumber; $i < $count; $i++) {
        if ($i == 0) {
            $result[] = $step;
        } else {
            $step += $generateCountStep;
            $result[] = $step;
        }
    }
    return $result;
}

function generateRandomHideNumber($generateProgression)
{
    $result = [];
    $generateRandomHideNumber = [];
    $randomHideKey = rand(1, COUNT_PROGRESSION - 2);

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

function generateQuestionAndAnswer()
{
    $generateRandomProgression = generateRandomProgression(COUNT_PROGRESSION);

    return generateRandomHideNumber($generateRandomProgression);
}

function generateCollectQuestionsAndAnswers($gameRound)
{
    $result = [];
    for ($i = 0; $i < $gameRound; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}


function runProgressionGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(GAME_ROUND);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_PROGRESSION);
}
