<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

// Welcome
function run($welcome)
{
    line($welcome);
    $name = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $name);
    return $name;
}

// Congratulations
function myCongratz($name)
{
    line("Congratulations, %s!", $name);
    die;
}

// generate two random integer
// return
//     Array
//     (
//         [firstNum] => 25
//         [secondNum] => 42
//     )
function genNumArr()
{
    $res = [];
    $res['firstNum'] = rand(1, 50);
    $res['secondNum'] = rand(1, 50);
    return $res;
}

// expression array to string
//     Array
//     (
//         [firstNum] => 'firstNum'
//         [sign] => 'sign'
//         [secondNum] => 'secondNum'
//     )
//   return =>  "'firstNum''sign' 'secondNum'"
function expToString($arr)
{
    return "{$arr['firstNum']} {$arr['sign']} {$arr['secondNum']}";
}

// задаем вопрос пользователю
function askQuestion($arr)
{
    $strExp = expToString($arr);
    line("Question: {$strExp}");
    $answer = prompt("Your answer");
    return $answer;
}
