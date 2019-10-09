<?php 

namespace BrainGames\evenGames;

use function cli\line;
use function cli\prompt;



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
	if ($num % 2 == 0)
	{
		return 'yes';
	}
	return 'no';
}

// задаем вопрос пользователю
function askQuestion($arr)
{
	line("Question: {$arr['number']}");
	$answer = prompt("Your answer");
	return $answer;
}

// корректный ли ответ?
function isCorrectAnswer($answer, $evenOrNot, $name)
{
	if ($answer !== 'yes' && $answer !== 'no') {

		line("The answer can be only 'yes' or 'no'");

	}
	else if (($answer === 'yes' && $evenOrNot === 'yes') || ($answer === 'no' && $evenOrNot === 'no')) {

		line("Correct!");

	}
	else {

		line("{$answer} is wrong answer ;(. Correct answer was {$evenOrNot}. Let's try again, {$name}!");

	}
}
