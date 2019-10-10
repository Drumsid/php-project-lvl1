<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    $name = prompt('May I have your name', $default = false, "? ");
    line("Hello, %s!", $name);
    return $name;
}
