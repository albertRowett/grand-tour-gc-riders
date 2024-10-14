<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\RetiredHtml;
use Collection\Models\RidersModel;

require_once './database.php';
require_once './vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();
$retiredHtml = new RetiredHtml();

$riders = $ridersModel->getRetiredRiders();

// Handling form submission (edit/unretire rider)
if ($riders) {
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
}

// Displaying the page
$headHtml->display();
$retiredHtml->display($riders);
