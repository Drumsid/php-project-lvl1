<?php

namespace BrainGames\progressionGame;

use function cli\line;
use function cli\prompt;

function randomStep()
{
    return rand(2, 5);
}

// ниже в коментах почти готова функция рандом число в прогрессии

// print_r(randomStep());

// $res = [];

// $randCount = randomStep();

// $randomStartNum = rand(1, 10);

// $randomHide = rand(1, 8);


// for ($i = 0, $s = $randomStartNum, $j = $s; $i < 10; $i++) {
//     if ($i == 0) {
//         $res[] = $s;
//     } else {
//         $j += $randCount;
//         $res[] = $j;
//     }
// }
//
// print_r($res);
//
// $result = [];
// foreach ($res as $k => $v) {
//     if ($k == $randomHide) {
//         $result[] = "..";
//     } else {
//         $result[] = $v;
//     }
// }
//
// print_r($result);
