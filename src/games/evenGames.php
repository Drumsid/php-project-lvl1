<?php

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;

// генерирует число и проверяет положительное оно или нет, вернет массив [num, bool]
function generateNum()
{
    $result = [];
    $num = rand(1, 100);
    $bool = isEven($num);
    $result['number'] = $num;
    $result['even'] = $bool;
    return $result;
}

// проверяем положительное ли число
function isEven($num)
{
    if ($num % 2 == 0) {
        return 'yes';
    }
    return 'no';
}

// get even or not
function getEven($arr)
{
    return $arr['even'];
}

// get even or not
function getNumber($arr)
{
    return $arr['number'];
}


// корректный ли ответ?
function isCorrectAnswer($answer, $evenOrNot, $name)
{
    if (($answer === 'yes' && $evenOrNot === 'yes') || ($answer === 'no' && $evenOrNot === 'no')) {
        line("Correct!");
        return 1;
    } else {
        line("{$answer} is wrong answer ;(. Correct answer was {$evenOrNot}. Let's try again, {$name}!");
        die;
    }
}

// run the even game
function runEvenGame()
{
    $result = 0;

    $welcome = "Welcome to the Brain Games!\nAnswer 'yes' if the number is even, otherwise answer 'no'.\n";


    // ask name user
    $name = run($welcome);

    // start the game
    while (true) {
        // generate number
        $numEven = generateNum();

        // get number from arrNumEven
        $number = getNumber($numEven);

        // ask question isEven number?
        $answer = askQuestion($number);


        // compare answer and num
        $compareAnswer = isCorrectAnswer($answer, getEven($numEven), $name);

        if ($compareAnswer == 1) {
            $result++;
        } elseif ($compareAnswer == 0) {
            $result = 0;
        }

      // Congratulations
        if ($result == 3) {
            myCongratz($name);
        }
    }
}
