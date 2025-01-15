<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\FooterHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\HTML\PageContents\IndexHtml;
use Collection\Models\NationsModel;
use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$teamsModel = new TeamsModel($db);
$nationsModel = new NationsModel($db);
$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$indexHtml = new IndexHtml();
$footerHtml = new FooterHtml();

$teamId = $_GET['team'] ?? '0';
if (
    $teamId !== '0'
    && (intval($teamId) != $teamId // short-circuit DB check if $teamId is non-int
    || $teamsModel->checkForTeamById($teamId, true) === false)
) {
    header('Location: index.php');
    exit;
}

$nationId = $_GET['nation'] ?? '0';
if (
    $nationId !== '0'
    && (intval($nationId) != $nationId // short-circuit DB check if $nationId is non-int
    || $nationsModel->checkForNationById($nationId) === false)
) {
    header('Location: index.php');
    exit;
}

$activeRiders = $ridersModel->getRiders(0, $teamId, $nationId);
$activeTeams = $teamsModel->getTeams(1);
$nations = $nationsModel->getNations();

// Handle form submission (edit/retire rider)
if ($activeRiders) {
    foreach ($activeRiders as $rider) {
        $buttonClicked = $_POST[$rider->id] ?? false;

        if ($buttonClicked === 'Edit') {
            header("Location: editRider.php?id=$rider->id");
            exit;
        } elseif ($buttonClicked === 'Retire') {
            if ($ridersModel->toggleRiderRetirement($rider->id, 1) === false) { // Catch rider update error
                header('Location: index.php?error=1');
                exit;
            }

            header("Location: index.php?team=$teamId&nation=$nationId");
            exit;
        }
    }
}

// Display page
$headHtml->display();
$headerHtml->display();
$indexHtml->display($activeRiders, $activeTeams, $teamId, $nations, $nationId);
$footerHtml->display();
