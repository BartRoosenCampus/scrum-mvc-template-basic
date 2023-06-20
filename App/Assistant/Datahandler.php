<?php

namespace App\Assistant;

class Datahandler
{
    public static function create()
    {
        echo "\nNew DataHandler";
        echo "\n---------------\n";
        $name         = readline("Name: ");
        $extends      = readline("Does this data handler extends another class? [Y/N]: ");
        $extendsClass = null;

        if ("Y" === $extends) {
            $extendsClass = readline("Which class: ");
        }

        $file = sprintf('App/Data/%s.php', $name);

        if (file_exists($file)) {
            echo "\e[31m";
            echo sprintf("\n\nAbort!!! %s already exists\n\n", $file);
            echo "\e[39m";
            sleep(3);
        } else {
            if (null !== $extendsClass) {
                $insert = sprintf('%s extends %s', $name, $extendsClass);
            } else {
                $insert = $name;
            }

            $content = sprintf(
                file_get_contents('App/Assistant/templates/datahandler.template'),
                $insert,
            );

            file_put_contents($file, $content);
        }
    }
}
