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

    // ask name user
    $userName = run("What number is missing in the progression?\n");

    while (true) {
        // generate progression and correct answer
        $progression = progressionWithRandomHidenNumber();

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
