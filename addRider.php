<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\AddRiderHtml;
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
$addRiderHtml = new AddRiderHtml();
$footerHtml = new FooterHtml();

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
        )
    ) {
        $team = trim($team);
        $teamId = $teamsModel->getIdFromTeam($team);
        if ($teamId === false) { // i.e. team is not in DB
            if ($teamsModel->addTeam($team)) {
                $teamId = $teamsModel->getIdFromTeam($team);
                if ($teamId === false) { // Catch error
                    header('Location: addRider.php?error=1');
                    exit;
                }
            } else { // Catch error
                header('Location: addRider.php?error=1');
                exit;
            }
        }

        $nation = trim($nation);
        $nationId = $nationsModel->getIdFromNation($nation);
        if ($nationId === false) { // i.e. nation is not in DB
            if ($nationsModel->addNation($nation)) {
                $nationId = $nationsModel->getIdFromNation($nation);
                if ($nationId === false) { // Catch error
                    header('Location: addRider.php?error=1');
                    exit;
                }
            } else { // Catch error
                header('Location: addRider.php?error=1');
                exit;
            }
        }

        $name = trim($name);
        $image = trim($image);

        if (
            $ridersModel->addRider(
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
            )
        ) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: addRider.php?error=1');
            exit;
        };
    } else {
        header('Location: addRider.php?error=1');
        exit;
    }
}

// Display page
$headHtml->display();
$headerHtml->display();
$addRiderHtml->display();
$footerHtml->display();
