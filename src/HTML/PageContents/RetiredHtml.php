<?php

namespace Collection\HTML\PageContents;

use DateTime;

class RetiredHtml
{
    private function unretireRiderError()
    {
        if (isset($_GET['error']) && $_GET['error'] === '1') {
            return 'An error occurred while unretiring the rider. Please try again later.';
        }
    }

    public function display(array|false $riders)
    {
        echo "
        <main>
            <p class='errorMsg'>{$this->unretireRiderError()}</p>
            <div class='ridersContainer'>
        ";

        if (!$riders) {
            echo "<p class='noRidersMsg'>No riders found</p>";
        } else {
            $today = new DateTime(date('y-m-d'));

            foreach ($riders as $rider) {
                $dob = new DateTime($rider->dob);
                $diff = $today->diff($dob);
                $age = $diff->y;

                echo "
                <div class='riderContainer'>
                    <h3>$rider->name</h3>
                    <img src='$rider->image' alt='$rider->name in $rider->team jersey' class='riderImg' />
                    <p><b>Last team:</b> $rider->team</p>
                    <div class='flexrow'>
                        <p><b>Nation:</b> $rider->nation</p>
                        <p><b>Age:</b> $age</p>
                    </div>
                    <p class='title'><b>GC wins:</b></p>
                    <div class='flexrow'>
                        <p><b>Giro:</b> $rider->giroGc</p>
                        <p><b>Tour:</b> $rider->tourGc</p>
                        <p><b>Vuelta:</b> $rider->vueltaGc</p>
                    </div>
                    <p class='title'><b>Stage wins:</b></p>
                    <div class='flexrow'>
                        <p><b>Giro:</b> $rider->giroStages</p>
                        <p><b>Tour:</b> $rider->tourStages</p>
                        <p><b>Vuelta:</b> $rider->vueltaStages</p>
                    </div>
                    <form class='riderButtons' method='POST'>
                        <input type='submit' class='riderButton' name='$rider->id' value='Edit' />
                        <input type='submit' class='riderButton' name='$rider->id' value='Unretire' />
                    </form>
                </div>
                ";
            }
        }

        echo '
            </div>
        </main>
        ';
    }
}
