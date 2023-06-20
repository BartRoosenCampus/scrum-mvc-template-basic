<?php
// assistant.php
declare(strict_types = 1);

use App\Assistant\Code;
use App\Assistant\Datahandler;
use App\Assistant\Menu;
use App\Assistant\NewPage;

spl_autoload_register();

$continue = true;

while ($continue) {
    switch (Menu::draw()) {
        case 1:
            NewPage::create();
            break;
        case 2:
            Datahandler::create();
            break;
        case "C":
            Code::commitAndPush();
            break;
        case "q":
        default:
            $continue = false;
            break;
    }
}
