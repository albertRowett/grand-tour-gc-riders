<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\EditRiderHtml;
use Collection\HTML\PageContents\FooterHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\Models\NationsModel;
use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;
use Collection\RiderFormValidator;

require_once 'database.php';
require_once 'vendor/autoload.php';

$riderFormValidator = new RiderFormValidator();
$ridersModel = new RidersModel($db);
$teamsModel = new TeamsModel($db);
$nationsModel = new NationsModel($db);
$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$editRiderHtml = new EditRiderHtml();
$footerHtml = new FooterHtml();

// Redirect if rider id invalid
$riderId = $_GET['id'] ?? false;
if (intval($riderId) != $riderId) { // i.e. $riderId is not int
    header('Location: index.php');
    exit;
}
$rider = $ridersModel->getRiderById($riderId);
if ($rider === false) { // i.e. rider is not in DB
    header('Location: index.php');
    exit;
}

// Handle form submission
$name = $_POST['name'] ?? false;
$image = $_POST['image'] ?? false;
$team = $_POST['team'] ?? false;
$nation = $_POST['nation'] ?? false;
$dob = $_POST['dob'] ?? false;
$giroGc = $_POST['giroGc'] ?? false;
$tourGc = $_POST['tourGc'] ?? false;
$vueltaGc = $_POST['vueltaGc'] ?? false;
$giroStages = $_POST['giroStages'] ?? false;
$tourStages = $_POST['tourStages'] ?? false;
$vueltaStages = $_POST['vueltaStages'] ?? false;

if ($name !== false) { // Prevent validation attempt on page load
    if (
        $riderFormValidator->validateRiderForm(
            $name,
            $image,
            $team,
            $nation,
            $dob,
            $giroGc,
            $tourGc,
            $vueltaGc,
            $giroStages,
            $tourStages,
            $vueltaStages
        ) === false // i.e. validation failure
    ) {
        header("Location: editRider.php?id=$riderId&error=1");
        exit;
    }

    $team = trim($team);
    $teamId = $teamsModel->getIdFromTeam($team);

    if ($teamId === false) { // i.e. team is not in DB
        if ($teamsModel->addTeam($team) === false) { // Catch team addition error
            header("Location: editRider.php?id=$riderId&error=1");
            exit;
        }

        $teamId = $teamsModel->getIdFromTeam($team);

        if ($teamId === false) { // Catch id retrieval error
            header("Location: editRider.php?id=$riderId&error=1");
            exit;
        }
    }

    $nation = trim($nation);
    $nationId = $nationsModel->getIdFromNation($nation);

    if ($nationId === false) { // i.e. nation is not in DB
        if ($nationsModel->addNation($nation) === false) { // Catch nation addition error
            header("Location: editRider.php?id=$riderId&error=1");
            exit;
        }

        $nationId = $nationsModel->getIdFromNation($nation);

        if ($nationId === false) { // Catch id retrieval error
            header("Location: editRider.php?id=$riderId&error=1");
            exit;
        }
    }

    $name = trim($name);
    $image = trim($image);

    if (
        $ridersModel->editRider(
            $riderId,
            $name,
            $image,
            $teamId,
            $nationId,
            $dob,
            $giroGc,
            $tourGc,
            $vueltaGc,
            $giroStages,
            $tourStages,
            $vueltaStages
        ) === false // Catch rider update error
    ) {
        header("Location: editRider.php?id=$riderId&error=1");
        exit;
    }

    if ($rider->retired) {
        header('Location: retired.php');
        exit;
    } else {
        header('Location: index.php');
        exit;
    }
}

// Display the page
$headHtml->display();
$headerHtml->display();
$editRiderHtml->display($rider);
$footerHtml->display();
