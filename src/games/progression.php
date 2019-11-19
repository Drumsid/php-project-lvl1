<?php

namespace BrainGames\games\progression;

use function BrainGames\general\runEngine;

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

function generateRandomHideValue($progression, $hiddenElementIndex)
{
    $result = [];
    $progressionWithHideValue = [];

    foreach ($progression as $key => $value) {
        if ($key == $hiddenElementIndex) {
            $progressionWithHideValue[] = "..";
        } else {
            $progressionWithHideValue[] = $value;
        }
    }

    $result['question'] = implode(" ", $progressionWithHideValue);
    $result['correctAnswer'] = (string) $progression[$hiddenElementIndex];

    return $result;
}

function runProgressionGame()
{
    $generateGameData = function () {
        $startPoint = rand(1, 10);
        $progressionStep = rand(2, 5);
        $progression = generateRandomProgression(COUNT_PROGRESSION, $startPoint, $progressionStep);
        $hiddenElementIndex = rand(0, COUNT_PROGRESSION - 1);
        return generateRandomHideValue($progression, $hiddenElementIndex);
    };

    runEngine($generateGameData, GAME_RULE_PROGRESSION);
}
