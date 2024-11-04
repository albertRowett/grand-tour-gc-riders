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

$riders = $ridersModel->getRiders(0, null);
$teams = $teamsModel->getTeams();

// Handle form submission (edit/retire rider)
if ($riders) {
    foreach ($riders as $rider) {
        $buttonClicked = $_POST[$rider->id] ?? false;

        if ($buttonClicked === 'Retire') {
            $ridersModel->toggleRiderRetirement($rider->id, 1) ? header('Location: index.php') : header('Location: index.php?error=1');
        } elseif ($buttonClicked === 'Edit') {
            header("Location: editRider.php?id=$rider->id");
        }
    }
}

// Display page
$headHtml->display();
$headerHtml->display();
$indexHtml->display($riders, $teams);
