<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\HTML\PageContents\IndexHtml;
use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$teamsModel = new TeamsModel($db);
$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$indexHtml = new IndexHtml();

// Handling form submission (rider retirement)
$allRiders = $ridersModel->getActiveRiders();

foreach ($allRiders as $rider) {
    $buttonClicked = $_POST[$rider->id] ?? false;

    if ($buttonClicked === 'Retire') {
        if (!$ridersModel->retireRider($rider->id)) {
            header('Location: index.php?error=1');
        }
    } elseif ($buttonClicked === 'Edit') {
        header("Location: editRider.php?id=$rider->id");
    }
}

// Displaying the page
$headHtml->display();
$headerHtml->display();
$indexHtml->display($ridersModel, $teamsModel);
