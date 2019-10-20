<?php

namespace BrainGames\progressionGame;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;
use function BrainGames\General\printCorrect;
use function BrainGames\General\printWrongAnswer;
use function BrainGames\General\countResult;

function randomStep()
{
    return rand(2, 5);
}

// genirate progression
function generateProgression()
{
    $generateProgression = [];

    $randomCountStep = randomStep();

    $randomStartNumber = rand(1, 10);

    $randomHideKey = rand(1, 8);

    $result = [];

    for ($i = 0, $step = $randomStartNumber; $i < 10; $i++) {
        if ($i == 0) {
            $generateProgression[] = $step;
        } else {
            $step += $randomCountStep;
            $generateProgression[] = $step;
        }
    }

    $generateRandomHideNumber = [];
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
function compareAnswer($userAnswer, $correctAnswer, $userName)
{
    if ($userAnswer != $correctAnswer) {
        printWrongAnswer($userAnswer, $correctAnswer, $userName);
    } else {
        return printCorrect();
    }
}

// run progression game
function runProgressionGame()
{
    $result = 0;

    $welcome = "Welcome to the Brain Games!\nWhat number is missing in the progression?\n";

    // ask name user
    $userName = run($welcome);

    while (true) {
        // generate progression and correct answer
        $progression = generateProgression();

        // get progression str from array
        $expressionProgression = getProgression($progression);

        //ask question
        $userAnswer = askQuestion($expressionProgression);

        //get correct answer
        $correctAnswer = getCorrectAnswer($progression);

        //is correct answer?
        $compareAnswer = compareAnswer($userAnswer, $correctAnswer, $userName);

        // conunt result
        $result += countResult($compareAnswer);

        // Congratulations
        myCongratz($userName, $result);
    }
}
