<?php

namespace BrainGames\general;

use function cli\line;
use function cli\prompt;

function runEngine($func, $gameRule)
{
    $result = 0;
    line("Welcome to the Brain Games!");
    line($gameRule);
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);
    while (true) {
        $collect = $func();
        line("Question: {$collect['question']}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $collect['correctAnswer']) {
            $result++;
             line("Correct!");
        } else {
            line("{$userAnswer} is wrong answer ;(.");
            line("Correct answer was {$collect['correctAnswer']}.Let's try again, {$userName}!");
            die();
        }

        if ($result == 3) {
            line("Congratulations, %s!", $userName);
            die();
        }
    }
}
