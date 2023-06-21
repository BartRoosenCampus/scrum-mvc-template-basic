<?php

namespace App\Assistant;

class Menu
{
    private static array $options = [
        1   => "Nieuwe pagina toevoegen\n",
        2   => "Een DataHandler toevoegen\n",
        "C" => "Commit and push you code\n",
        "q" => "Quit\n",
    ];

    public static function draw()
    {
        echo "Opties\n";
        echo "------\n";
        echo "\e[93m";
        foreach (Config::ACTIONS_OPTIONS as $key => $value) {
            echo sprintf('[%s] %s', $key, $value);
        }
        echo "\e[39m";

        return readline("Kies een optie: ");
    }
}