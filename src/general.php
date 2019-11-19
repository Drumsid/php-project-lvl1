<?php

namespace BrainGames\general;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runEngine($generateGameData, $gameRule)
{
    line("Welcome to the Brain Games!");
    line($gameRule);
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $generateGameData();
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $correctAnswer) {
             line("Correct!");
        } else {
            line("{$userAnswer} is wrong answer ;(.");
            line("Correct answer was {$correctAnswer}. Let's try again, {$userName}!");
            die();
        }
    }
    line("Congratulations, %s!", $userName);
}
