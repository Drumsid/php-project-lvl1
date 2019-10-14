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

// get progression str from array
function getProgression($arr)
{
    return $arr['progression'];
}

// get correct answer from array
function getCorrectAns($arr)
{
    return $arr['correctAnswer'];
}


// compare answer
function isCorrectAnswer($correctAnswer, $userAnswer, $name)
{
    if ($userAnswer != $correctAnswer) {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}. Let's try again, {$name}!");
        die;
    } else {
        line("Correct!");
        return 1;
    }
}
