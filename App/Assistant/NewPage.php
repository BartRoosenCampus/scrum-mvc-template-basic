<?php

namespace App\Assistant;

class NewPage extends ContentGetter
{
    public static function create()
    {
        Toolbox::clearScreen();

        Toolbox::writeText('New page', Config::TEXT_YELLOW, true);
        $name       = readline("Page Name: ");
        $viewFolder = readline("View folder: ");
        $controller = readline("Controller [Y/N]: ");
        $menuItem   = readline("Menu item [Y/N]: ");
        $folder     = sprintf(Config::VIEWS_FOLDER, $viewFolder);

        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $file = sprintf('%s%s.php', $folder, $name);

        file_put_contents($file, sprintf(self::getContent(Config::TEMPLATE_PAGE), ucfirst($name)));
        $controllerName = sprintf('%sController.php', $name);

        if ('Y' === $controller) {
            file_put_contents(
                $controllerName,
                sprintf(self::getContent(Config::TEMPLATE_CONTROLLER), ucfirst($name), $file)
            );
        }

        if ('Y' === $menuItem) {
            $itemHtml = sprintf(
                self::getContent(Config::TEMPLATE_MENU_ITEM),
                $controllerName,
                ucfirst($name)
            );

            file_put_contents(
                Config::NAVBAR,
                file_get_contents(Config::NAVBAR) . "\n" . $itemHtml
            );
        }

        Toolbox::writeText("New page created", Config::TEXT_YELLOW);
        sleep(3);
    }
}
