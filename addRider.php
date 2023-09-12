<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\AddRiderHtml;
use Collection\Models\RidersModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();
$addRiderHtml = new AddRiderHtml();

$headHtml->display();
$addRiderHtml->display();
