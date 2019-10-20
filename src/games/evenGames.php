<?php

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;
use function BrainGames\General\run;
use function BrainGames\General\askQuestion;
use function BrainGames\General\myCongratz;
use function BrainGames\General\printCorrect;
use function BrainGames\General\printWrongAnswer;
use function BrainGames\General\countResult;

// генерирует число и проверяет положительное оно или нет, вернет массив [num, bool]
function generateNumber()
{
    $result = [];
    $number = rand(1, 100);
    $yesOrNo = isEven($number);
    $result['number'] = $number;
    $result['even'] = $yesOrNo;
    return $result;
}

// проверяем положительное ли число
function isEven($number)
{
    if ($number % 2 == 0) {
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
function compareAnswer($userAnswer, $evenOrNot, $userName)
{
    if (($userAnswer === 'yes' && $evenOrNot === 'yes') || ($userAnswer === 'no' && $evenOrNot === 'no')) {
        return printCorrect();
    } else {
        printWrongAnswer($userAnswer, $evenOrNot, $userName);
    }
}

// run the even game
function runEvenGame()
{
    $result = 0;

    $welcome = "Welcome to the Brain Games!\nAnswer 'yes' if the number is even, otherwise answer 'no'.\n";


    // ask name user
    $userName = run($welcome);

    // start the game
    while (true) {
        // generate number
        $randomEvenNumber = generateNumber();

        // get number from arrNumEven
        $number = getNumber($randomEvenNumber);

        // get even or not
        $evenOrNot = getEven($randomEvenNumber);

        // ask question isEven number?
        $userAnswer = askQuestion($number);


        // compare answer and num
        $compareAnswer = compareAnswer($userAnswer, $evenOrNot, $userName);

        // conunt result
        $result += countResult($compareAnswer);

        // Congratulations
        myCongratz($userName, $result);
    }
}
