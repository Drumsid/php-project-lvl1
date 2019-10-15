<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\expToString;
use function BrainGames\General\genNumArr;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;

// find fcd
function gcd($arr)
{
    while ($arr['firstNum'] != $arr['secondNum']) {
        if ($arr['firstNum'] > $arr['secondNum']) {
            $arr['firstNum'] -= $arr['secondNum'];
        } else {
            $arr['secondNum'] -= $arr['firstNum'];
        }
    }
    return $arr['firstNum'];
}

// add space sign
function addSpaseSign($arr)
{
    $arr['sign'] = "";
    return $arr;
}

// is correct answer?
function isCorrectAnswer($userAnswer, $corectAnswer, $name)
{
    if ($userAnswer != $corectAnswer) {
        line("{$userAnswer} is wrong answer ;(. Correct answer was {$corectAnswer}. Let's try again, {$name}!");
        die;
    } else {
        line("Correct!");
        return 1;
    }
}

//run gcd game
function runGcdGame()
{
    $result = "";

    $welcome = "Welcome to the Brain Games!\nFind the greatest common divisor of given numbers.\n";

    // ask name user
    $name = run($welcome);

    while (true) {
        //generate Num array
        $expNum = genNumArr();

        // add space
        $exp = addSpaseSign($expNum);

        //exp to string
        $expToString = expToString($exp);

        // ask question
        $userAnswer = askQuestion($expToString);

        //is correct answer
        $corectAnswer = gcd($expNum);

        //is correct answer?
        $compareAnswer = isCorrectAnswer($userAnswer, $corectAnswer, $name);

        if ($compareAnswer == 1) {
            $result++;
        }

        // Congratulations
        if ($result == 3) {
            myCongratz($name);
        }
    }
}
