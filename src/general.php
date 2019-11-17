<?php

namespace BrainGames\general;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function runEngine($func, $gameRule)
{
    $result = 0;
    line("Welcome to the Brain Games!");
    line($gameRule);
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);
    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $questionAndAnswer = $func();
        line("Question: {$questionAndAnswer['question']}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $questionAndAnswer['correctAnswer']) {
            $result++;
             line("Correct!");
        } else {
            line("{$userAnswer} is wrong answer ;(.");
            line("Correct answer was {$questionAndAnswer['correctAnswer']}.Let's try again, {$userName}!");
            die();
        }
        if ($result == 3) {
            line("Congratulations, %s!", $userName);
            die();
        }
    }
}
