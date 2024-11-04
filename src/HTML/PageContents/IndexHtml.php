<?php

namespace Collection\HTML\PageContents;

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

    private function retireRiderError()
    {
        if ($_GET['error'] === '1') {
            return 'An error occurred while retiring the rider. Please try again later.';
        }
    }

    public function display(array|false $riders, array|false $teams): void
    {
        echo "
            <form class='filters'>
                <label for='teams'>Filter by team:</label>
                <select name='team' id='teams' onchange='this.form.submit()'>
                <option value='0'>Select team</option>";

        if ($teams) {
            foreach ($teams as $team) {
                echo "<option value='$team->id'>$team->team</option>";
            }
        }

        echo "
                </select>
                <noscript><input type='submit' value='Submit'></noscript>
            </form>
            <div class='ridersContainer'>
                <p class='dbError'>{$this->retireRiderError()}</p>
        ";

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
                    <p><b>Team:</b> $rider->team</p>
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
                        <input type='submit' class='riderButton' name='$rider->id' value='Retire' />
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
