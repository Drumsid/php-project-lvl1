<?php

namespace BrainGames\general\general;

use function cli\line;
use function cli\prompt;

define('GAME_ROUNDS', 3);


function runEngine($collectQuestionsAndAnswers, $welcome)
{
    line("Welcome to the Brain Games!\n{$welcome}\n");
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);

    foreach ($collectQuestionsAndAnswers as ['question' => $question, 'correctAnswer' => $correctAnswer]) {
        line("Question: {$question}");
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.Let's try again, {$userName}!");
            die();
        }
    }
    line("Congratulations, %s!", $userName);
}