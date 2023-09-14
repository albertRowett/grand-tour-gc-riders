<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\IndexHtml;
use Collection\Models\RidersModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();
$indexHtml = new IndexHtml();

// Handling form submission (rider retirement)
$allRiders = $ridersModel->getActiveRiders();

foreach ($allRiders as $rider) {
    $retireClicked = $_POST[$rider->id] ?? false;

    if ($retireClicked) {
        if (!$ridersModel->retireRider($rider->id)) {
            header('Location: index.php?error=1');
        }
    }
}

// Displaying the page
$headHtml->display();
$indexHtml->display($ridersModel);
