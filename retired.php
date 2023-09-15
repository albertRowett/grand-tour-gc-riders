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
$riders = $ridersModel->getRetiredRiders();

foreach ($riders as $rider) {
    $buttonClicked = $_POST[$rider->id] ?? false;

    if ($buttonClicked === 'Unretire') {
        if (!$ridersModel->unretireRider($rider->id)) {
            header('Location: retired.php?error=1');
        }
    } elseif ($buttonClicked === 'Edit') {
        header("Location: editRider.php?id=$rider->id");
    }
}

// Displaying the page
$headHtml->display();
$retiredHtml->display($ridersModel, $teamsModel);
