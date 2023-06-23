<?php

namespace App\Assistant;

class Menu
{
    public static function draw()
    {
        Toolbox::clearScreen();
        Toolbox::writeText('Opties', Config::TEXT_YELLOW, true);
        foreach (Config::ACTIONS_OPTIONS as $key => $value) {
            Toolbox::writeText(sprintf('[%s] %s', $key, $value), Config::TEXT_YELLOW, false);
        }

        return readline("Kies een optie: ");
    }
}