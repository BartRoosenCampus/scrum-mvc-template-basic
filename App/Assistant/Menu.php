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
        Text::write('Opties', Config::TEXT_YELLOW, true);
        foreach (Config::ACTIONS_OPTIONS as $key => $value) {
            Text::write(sprintf('[%s] %s', $key, $value), Config::TEXT_YELLOW, false);
        }

        return readline("Kies een optie: ");
    }
}