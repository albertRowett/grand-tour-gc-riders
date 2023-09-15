<?php

namespace Collection\HTML\PageContents;

use Collection\Models\RidersModel;
use Collection\Models\TeamsModel;
use DateTime;

class RetiredHtml
{
    private function nullToZero(int|null $wins): int
    {
        if ($wins === null) {
            return 0;
        }
        return $wins;
    }

    private function unretireRiderError()
    {
        if ($_GET['error'] === '1') {
            return 'An error occurred while unretiring the rider. Please try again later.';
        }
    }

    public function display(RidersModel $ridersModel, TeamsModel $teamsModel): void
    {
        echo "
        <body>
            <header>
                <h1>Grand Tour GC Riders</h1>
                <nav>
                    <a href='index.php'>View Riders</a>
                    <a href='addRider.php'>Add a Rider</a>
                </nav>
            </header>
            <div class='ridersContainer'>
                <p class='dbError'>{$this->unretireRiderError()}</p>
        ";

        $riders = $ridersModel->getRetiredRiders();

        if ($riders) {
            $today = new DateTime(date('y-m-d'));

            foreach ($riders as $rider) {
                $dob = new DateTime($rider->dob);
                $diff = $today->diff($dob);
                $age = $diff->y;

                echo "
                <div class='riderContainer'>
                    <h3>$rider->name</h3>
                    <img src='$rider->image' alt='$rider->name in $rider->team jersey' />
                    <p><b>Last team:</b> $rider->team</p>
                    <div class='flexrow'>
                        <p><b>Nation:</b> $rider->nation</p>
                        <p><b>Age:</b> $age</p>
                    </div>
                    <p class='title'><b>GC wins:</b></p>
                    <div class='flexrow'>
                        <p><b>Giro: </b> {$this->nullToZero($rider->giroGc)}</p>
                        <p><b>Tour:</b> {$this->nullToZero($rider->tourGc)}</p>
                        <p><b>Vuelta:</b> {$this->nullToZero($rider->vueltaGc)}</p>
                    </div>
                    <p class='title'><b>Stage wins:</b></p>
                    <div class='flexrow'>
                        <p><b>Giro:</b> {$this->nullToZero($rider->giroStages)}</p>
                        <p><b>Tour:</b> {$this->nullToZero($rider->tourStages)}</p>
                        <p><b>Vuelta:</b> {$this->nullToZero($rider->vueltaStages)}</p>
                    </div>
                    <form class='riderButtons' method='POST'>
                        <input type='submit' class='riderButton' name='$rider->id' value='Edit' />
                        <input type='submit' class='riderButton' name='$rider->id' value='Unretire' />
                    </form>
                </div>
                ";
            }
        } else {
            echo "<p class='noRidersError'>No riders found</p>";
        }

        echo "
            </div>
        </body>";
    }
}
