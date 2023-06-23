<?php

namespace App\Assistant;

class Toolbox
{
    public static function clearScreen()
    {
        echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
    }

    public static function writeText(string $text, string $color = Config::TEXT_WHITE, $underline = false)
    {
        echo $color;
        echo sprintf("\n%s", $text);

        if ($underline) {
            $counter = strlen($text);
            $line    = "\n";
            for ($i = 0; $i < strlen($text); $i++) {
                $line .= "-";
            }
            $line .= "\n";

            echo $line;
        }

        echo Config::TEXT_WHITE;
    }
}