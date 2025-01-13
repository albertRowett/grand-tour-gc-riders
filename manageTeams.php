<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\FooterHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\HTML\PageContents\ManageTeamsHTML;
use Collection\Models\TeamsModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$teamsModel = new TeamsModel($db);
$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$manageTeamsHtml = new ManageTeamsHTML();
$footerHtml = new FooterHtml();

$teams = $teamsModel->getTeams();

// Display page
$headHtml->display();
$headerHtml->display();
$manageTeamsHtml->display($teams);
$footerHtml->display();
