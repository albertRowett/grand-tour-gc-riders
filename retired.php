<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\FooterHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\HTML\PageContents\RetiredHtml;
use Collection\Models\RidersModel;

require_once './database.php';
require_once './vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$retiredHtml = new RetiredHtml();
$footerHtml = new FooterHtml();

$retiredRiders = $ridersModel->getRiders(1, 0, 0);

// Handle form submission (edit/unretire rider)
if ($riders) {
    foreach ($riders as $rider) {
        $buttonClicked = $_POST[$rider->id] ?? false;

        if ($buttonClicked === 'Unretire') {
            if ($ridersModel->toggleRiderRetirement($rider->id, 0)) {
                header('Location: retired.php');
                exit;
            } else {
                header('Location: retired.php?error=1');
                exit;
            }
        } elseif ($buttonClicked === 'Edit') {
            header("Location: editRider.php?id=$rider->id");
            exit;
        }
    }
}

// Display page
$headHtml->display();
$headerHtml->display();
$retiredHtml->display($retiredRiders);
$footerHtml->display();
