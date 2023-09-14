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
        $ridersModel->retireRider($rider->id);
    }
}

// Displaying the page
$headHtml->display();
$indexHtml->display($ridersModel);

// echo '<pre><br/><br/>';
// var_dump($_POST);
