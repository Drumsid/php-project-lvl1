<?php

namespace BrainGames\gcdGames;

use function cli\line;
use function cli\prompt;

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
