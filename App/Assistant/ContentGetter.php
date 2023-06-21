<?php

namespace App\Assistant;

class ContentGetter
{
    public static function getContent(string $template): string
    {
        return file_get_contents(sprintf(Config::TEMPLATES_FOLDER, $template));
    }
}