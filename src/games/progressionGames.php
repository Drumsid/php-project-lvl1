<?php

namespace BrainGames\progressionGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;

function randomStep()
{
    return rand(2, 5);
}

// genirate progression
function generateProgression()
{
    $proressionInt = [];

    $randCountStep = randomStep();

    $randomStartNum = rand(1, 10);

    $randomHideKey = rand(1, 8);

    $result = [];

    for ($i = 0, $s = $randomStartNum, $j = $s; $i < 10; $i++) {
        if ($i == 0) {
            $proressionInt[] = $s;
        } else {
            $j += $randCountStep;
            $proressionInt[] = $j;
        }
    }

    $arrRandHideNum = [];
    foreach ($proressionInt as $k => $v) {
        if ($k == $randomHideKey) {
            $arrRandHideNum[] = "..";
        } else {
            $arrRandHideNum[] = $v;
        }
    }

    $result['progression'] = implode(" ", $arrRandHideNum);
    $result['correctAnswer'] = $proressionInt[$randomHideKey];
    return $result;
}

// get progression str from array
function getProgression($arr)
{
    return $arr['progression'];
}

// get correct answer from array
function getCorrectAnswer($arr)
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

// run progression game
function runProgressionGame()
{
    $result = "";

    $welcome = "Welcome to the Brain Games!\nWhat number is missing in the progression?\n";

    // ask name user
    $name = run($welcome);

    while (true) {
        // generate progression and correct answer
        $progression = generateProgression();

        // get progression str from array
        $progressionStr = getProgression($progression);

        //ask question
        $userAnswer = askQuestion($progressionStr);

        //get correct answer
        $correctAnswer = getCorrectAnswer($progression);

        //is correct answer?
        $compareAnswer = isCorrectAnswer($correctAnswer, $userAnswer, $name);

        if ($compareAnswer == 1) {
            $result++;
        }

      // Congratulations
        if ($result == 3) {
            myCongratz($name);
        }
    }
}
