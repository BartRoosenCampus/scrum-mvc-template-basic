<?php

namespace App\Assistant;

class NewPage
{
    public static function create()
    {
        $viewsFolder = 'App/Views/%s/';
        echo "\nNew page";
        echo "\n--------\n";
        $name       = readline("Page Name: ");
        $viewFolder = readline("View folder: ");
        $controller = readline("Controller [Y/N]: ");
        $menuItem   = readline("Menu item [Y/N]: ");
        $folder     = sprintf($viewsFolder, $viewFolder);

        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $file = $folder . $name . ".php";

        file_put_contents($file, sprintf(self::getContent('page.php'), ucfirst($name)));
        $controllerName = sprintf('%sController.php', $name);

        if ('Y' === $controller) {
            file_put_contents(
                $controllerName,
                sprintf(self::getContent('controller.php'), ucfirst($name), $file)
            );
        }

        if ('Y' === $menuItem) {
            $itemHtml = sprintf(
                self::getContent('menuItem.html'),
                $controllerName,
                ucfirst($name)
            );
            $navBarItemsFile = 'App/Views/components/navBarItems.php';

            file_put_contents(
                $navBarItemsFile,
                file_get_contents($navBarItemsFile) . "\n" . $itemHtml
            );
        }
    }

    private static function getContent(string $template): string
    {
        $path = 'App/Assistant/templates/%s';

        return file_get_contents(sprintf($path, $template));
    }
}
