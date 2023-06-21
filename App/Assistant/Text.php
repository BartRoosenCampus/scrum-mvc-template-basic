<?php

namespace App\Assistant;

class Text
{
    public static function write(string $text, string $color = Config::TEXT_WHITE)
    {
        echo $color;
        echo sprintf("\n%s\n", $text);
        echo Config::TEXT_WHITE;
    }
}