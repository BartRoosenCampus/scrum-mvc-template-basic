<?php
// index.php
declare(strict_types = 1);

if (!file_exists('homeController.php')) {
    echo 'Start creating pages';
} else {
    header('location: homeController.php');
}
