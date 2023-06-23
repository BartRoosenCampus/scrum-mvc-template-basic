<?php

namespace App\Assistant;

class Datahandler extends ContentGetter
{
    public static function create()
    {
        Toolbox::clearScreen();
        Toolbox::writeText('New DataHandler', Config::TEXT_YELLOW, true);
        $name         = readline("Name: ");
        $extends      = readline("Does this data handler extends another class? [Y/N]: ");
        $extendsClass = null;

        if ("Y" === $extends) {
            $extendsClass = readline("Which class: ");
        }

        $file = sprintf('App/Data/%s.php', $name);

        if (file_exists($file)) {
            Toolbox::writeText('Abort!!! %s already exists', Config::TEXT_RED);
            sleep(3);
        } else {
            if (null !== $extendsClass) {
                $insert = sprintf('%s extends %s', $name, $extendsClass);
            } else {
                $insert = $name;
            }

            $content = sprintf(
                self::getContent(Config::TEMPLATE_DATA_HANDLER),
                $insert,
            );

            file_put_contents($file, $content);
        }
    }
}
