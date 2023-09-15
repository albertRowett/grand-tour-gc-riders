<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\RetiredHtml;
use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$teamsModel = new TeamsModel($db);
$headHtml = new HeadHtml();
$retiredHtml = new RetiredHtml();

// Handling form submission (rider edit + unretirement)
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
$retireHtml->display($ridersModel, $teamsModel);
