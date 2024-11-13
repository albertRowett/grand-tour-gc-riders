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

$teamId = $_GET['team'] ?? null;
$teamId = $teamId === '0' ? null : $teamId;
if (
    $teamId !== null
    && (intval($teamId) != $teamId // short-circuit DB check if $teamId is non-int
    || $teamsModel->checkForTeamById($teamId) === false)
) {
    header('Location: index.php');
    exit;
}

$nationId = $_GET['nation'] ?? null;
$nationId = $nationId === '0' ? null : $nationId;
if (
    $nationId !== null
    && (intval($nationId) != $nationId // short-circuit DB check if $nationId is non-int
    || $nationsModel->checkForNationById($nationId) === false)
) {
    header('Location: index.php');
    exit;
}

$riders = $ridersModel->getRiders(0, $teamId, $nationId);
$teams = $teamsModel->getTeams();
$nations = $nationsModel->getNations();

// Handle form submission (edit/retire rider)
if ($riders) {
    foreach ($riders as $rider) {
        $buttonClicked = $_POST[$rider->id] ?? false;

        if ($buttonClicked === 'Retire') {
            if ($ridersModel->toggleRiderRetirement($rider->id, 1)) {
                header('Location: index.php');
                exit;
            } else {
                header('Location: index.php?error=1');
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
$indexHtml->display($riders, $teams, $teamId, $nations, $nationId);
$footerHtml->display();
