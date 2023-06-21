<?php

namespace App\Assistant;

class Config
{
    // Folders & files
    const TEMPLATES_FOLDER      = 'App/Assistant/templates/%s';
    const VIEWS_FOLDER          = 'App/Views/%s/';
    const NAVBAR                = 'App/Views/components/navBarItems.php';

    // Templates
    const TEMPLATE_PAGE         = 'page.template';
    const TEMPLATE_CONTROLLER   = 'controller.template';
    const TEMPLATE_MENU_ITEM    = 'menuItem.template';
    const TEMPLATE_DATA_HANDLER = 'dataHandler.template';

    //Actions
    const ACTIONS_OPTIONS = [
        1   => "Nieuwe pagina toevoegen\n",
        2   => "Een DataHandler toevoegen\n",
        "C" => "Commit and push your code\n",
        "q" => "Quit\n",
    ];
}