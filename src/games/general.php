<?php

namespace BrainGames\General;

use function cli\line;
use function cli\prompt;

//run engine The game
function runEngine($collectQuestionsAndAnswers, $welcome)
{
    line("Welcome to the Brain Games!\n{$welcome}\n");
    $userName = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $userName);

     //run questions
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
