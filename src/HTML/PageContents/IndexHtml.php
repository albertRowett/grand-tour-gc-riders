<?php

namespace Collection\HTML\PageContents;

use Collection\Models\RidersModel;
use DateTime;

class IndexHtml
{
    private function nullToZero(int|null $wins): int
    {
        if ($wins === null) {
            return 0;
        }
        return $wins;
    }

    public function display(RidersModel $ridersModel): void
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
        ";

        $allRiders = $ridersModel->getActiveRiders();

        if ($allRiders) {
            $today = new DateTime(date('y-m-d'));

            foreach ($allRiders as $rider) {
                $dob = new DateTime($rider->dob);
                $diff = $today->diff($dob);
                $age = $diff->y;

                echo "
                <div class='riderContainer'>
                    <h3>$rider->name</h3>
                    <img src='$rider->image' alt='$rider->name in $rider->team jersey' />
                    <p><b>Team:</b> $rider->team</p>
                    <div class='flexrow'>
                        <p><b>Nation:</b> $rider->nation</p>
                        <p><b>Age:</b> $age</p>
                    </div>
                    <p class='title'><b>GC wins:</b></p>
                    <div class='flexrow'>
                        <p><b>Giro: </b> {$this->nullToZero($rider->giroGC)}</p>
                        <p><b>Tour:</b> {$this->nullToZero($rider->tourGC)}</p>
                        <p><b>Vuelta:</b> {$this->nullToZero($rider->vueltaGC)}</p>
                    </div>
                    <p class='title'><b>Stage wins:</b></p>
                    <div class='flexrow'>
                        <p><b>Giro:</b> {$this->nullToZero($rider->giroStages)}</p>
                        <p><b>Tour:</b> {$this->nullToZero($rider->tourStages)}</p>
                        <p><b>Vuelta:</b> {$this->nullToZero($rider->vueltaStages)}</p>
                    </div>
                    <form method='POST'>
                        <input type='submit' name='$rider->id' value='Retire' />
                    </form>
                </div>
                ";
            }
        } else {
            echo 'No riders found';
        }

        echo "
            </div>
        </body>";
    }
}
