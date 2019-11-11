<?php

namespace BrainGames\games\progressionGame;

use function BrainGames\general\runEngine;

use const BrainGames\general\ROUNDS_COUNT;

const GAME_RULE_PROGRESSION = "What number is missing in the progression?";
const COUNT_PROGRESSION = 10;

function generateRandomProgression($count, $startPoint, $progressionStep)
{
    $result = [];

    for ($i = 0, $step = $startPoint; $i < $count; $i++) {
        if ($i == 0) {
            $result[] = $step;
        } else {
            $step += $progressionStep;
            $result[] = $step;
        }
    }
    return $result;
}

function generateRandomHideValue($progression, $hiddenValue)
{
    $result = [];
    $progressionWithHideValue = [];

    foreach ($progression as $k => $v) {
        if ($k == $hiddenValue) {
            $progressionWithHideValue[] = "..";
        } else {
            $progressionWithHideValue[] = $v;
        }
    }

    $result['question'] = implode(" ", $progressionWithHideValue);
    $result['correctAnswer'] = (string) $progression[$hiddenValue];

    return $result;
}

function generateQuestionAndAnswer()
{
    $startPoint = rand(1, 10);
    $progressionStep = rand(2, 5);
    $progression = generateRandomProgression(COUNT_PROGRESSION, $startPoint, $progressionStep);
    $hiddenValue = rand(0, COUNT_PROGRESSION - 1);
    return generateRandomHideValue($progression, $hiddenValue);
}

function generateCollectQuestionsAndAnswers($roundsCount)
{
    $result = [];
    for ($i = 0; $i < $roundsCount; $i++) {
        $result[] = generateQuestionAndAnswer();
    }
    return $result;
}

function runProgressionGame()
{
    $collectQuestionsAndAnswers = generateCollectQuestionsAndAnswers(ROUNDS_COUNT);

    runEngine($collectQuestionsAndAnswers, GAME_RULE_PROGRESSION);
}
