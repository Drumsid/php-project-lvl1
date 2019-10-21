<?php

namespace BrainGames\progressionGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\welcomToGame;
use function BrainGames\General\runEngine;
use function BrainGames\evenGames\sortByKey;

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

    $result['progression'] = implode(" ", $generateRandomHideNumber);
    $result['correctAnswer'] = $generateProgression[$randomHideKey];

    return $result;
}

// genirate progression
function progressionWithRandomHidenNumber()
{
    $generateRandomProgression = generateRandomProgression();

    return generateRandomHideNumber($generateRandomProgression);
}

//generate random progression array
function generateThreeProgressions()
{
    $result = [];
    for ($i = 0; $i < 3; $i++) {
        $result[] = progressionWithRandomHidenNumber();
    }
    return $result;
}


function runProgressionGame()
{
    $generateThreeProgressions = generateThreeProgressions();

    $progressions = sortByKey($generateThreeProgressions, 'progression');
    $correctAnswers = sortByKey($generateThreeProgressions, 'correctAnswer');

    $combineProgressionsAndCorrectAnswers = array_combine($progressions, $correctAnswers);

    runEngine($combineProgressionsAndCorrectAnswers, "What number is missing in the progression?\n");
}
