<?php

namespace BrainGames\progressionGame;

use function cli\line;
use function cli\prompt;

function randomStep()
{
    return rand(2, 5);
}

// genirate progression
function generateProgression()
{
    $arrProgressInt = [];

    $randCount = randomStep();

    $randomStartNum = rand(1, 10);

    $randomHide = rand(1, 8);

    $result = [];

    for ($i = 0, $s = $randomStartNum, $j = $s; $i < 10; $i++) {
        if ($i == 0) {
            $arrProgressInt[] = $s;
        } else {
            $j += $randCount;
            $arrProgressInt[] = $j;
        }
    }

    $arrRandHide = [];
    foreach ($arrProgressInt as $k => $v) {
        if ($k == $randomHide) {
            $arrRandHide[] = "..";
        } else {
            $arrRandHide[] = $v;
        }
    }

    $result['progression'] = implode(" ", $arrRandHide);
    $result['correctAnswer'] = $arrProgressInt[$randomHide];
    return $result;
}

// ask question
function askQuestion($arrProgression)
{
    line("Question: {$arrProgression['progression']}");
    $answer = prompt("Your answer");
    return $answer;
}

// compare answer
function isCorrectAnswer($arrProgression, $userAnswer, $name)
{
    if ($userAnswer != $arrProgression['correctAnswer']) {
        line("Question: {$arrProgression['progression']}");
        line("Your answer: {$userAnswer}");
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$arrProgression['correctAnswer']}.
         Let's try again, {$name}!");
        die;
    } else {
        line("Correct!");
        return 1;
    }
}
