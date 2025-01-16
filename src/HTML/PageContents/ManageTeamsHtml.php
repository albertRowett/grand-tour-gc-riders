<?php

namespace Collection\HTML\PageContents;

class ManageTeamsHtml
{
    private function manageTeamsError()
    {
        if (isset($_GET['error']) && $_GET['error'] === '1') {
            return 'An error occurred while updating the teams list. Please try again later.';
        }
    }

    public function display(array|false $teams): void
    {
        echo "
        <main>
            <p class='errorMsg'>{$this->manageTeamsError()}</p>
            <div class='teamsFormContainer'>
                <h2>Select Active Teams:</h2>
        ";

        if (!$teams) {
            echo "<p>No teams found</p>";
        } else {
            echo "<form class='teamsForm' method='POST'>";

            foreach ($teams as $team) {
                echo "
                <div>
                    <input type='checkbox' id='$team->team' name='$team->id' " . ($team->active ? ' checked' : '') . " />
                    <label for='$team->team' class='teamCheckbox'>$team->team</label>
                </div>
            ";
            }

            echo "
                <div class='teamsFormSubmit'>
                    <input type='submit' name='submit' value='Submit' />
                </div>
            </form>
            ";
        }

        echo "
            </div>
        </main>
        ";
    }
}
