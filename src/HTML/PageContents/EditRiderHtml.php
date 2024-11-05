<?php

namespace Collection\HTML\PageContents;

use Collection\Entities\Rider;

class EditRiderHtml
{
    private function editRiderError()
    {
        if (isset($_GET['error']) && $_GET['error'] === '1') {
            return 'An error occurred while editing the rider. Please try again later.';
        }
    }

    public function display(Rider $rider): void
    {
        $teamWording = $rider->retired ? 'Last team' : 'Team';

        echo "
        <main class='riderFormContainer'>
            <div class='width330'>
                <p class='dbError'>{$this->editRiderError()}</p>
                <h2>Edit Rider:</h2>
                <form class='riderForm' method='POST'>
                    <div class='riderStats'>
                        <div class='statRow nameRow'>
                            <label for='name'>Name:</label>
                            <input type='text' class='textInput' id='name' name='name' value='$rider->name' placeholder='Required' />
                        </div>
                        <div class='statRow imgRow'>
                            <label for='image'>Image URL:</label><br />
                            <textarea id='image' name='image' class='imgInput' placeholder='Required'>$rider->image</textarea>
                        </div>
                        <div class='statRow'>
                            <label for='team'>$teamWording:</label>
                            <input type='text' class='textInput' id='team' name='team' value='$rider->team' placeholder='Required' />
                        </div>
                        <div class='statRow'>
                            <label for='nation'>Nation:</label>
                            <input type='text' class='textInput' id='nation' name='nation' value='$rider->nation' placeholder='Required' />
                        </div>
                        <div class='statRow'>
                            <label for='dob'>Date of Birth:</label>
                            <input type='date' id='dob' name='dob' value='$rider->dob' />
                        </div>
                        <p class='title'><b>GC wins:</b></p>
                        <div class='flexrow statRow'>
                            <label for='giroGc'>Giro:</label>
                            <input type='number' class='numberInput' id='giroGc' name='giroGc' value='$rider->giroGc' min='0' max='255' />
                            <label for='tourGc'>Tour:</label>
                            <input type='number' class='numberInput' id='tourGc' name='tourGc' value='$rider->tourGc' min='0' max='255' />
                            <label for='vueltaGc'>Vuelta:</label>
                            <input type='number' class='numberInput' id='vueltaGc' name='vueltaGc' value='$rider->vueltaGc' min='0' max='255' />
                        </div>
                        <p class='title'><b>Stage wins:</b></p>
                        <div class='flexrow statRow'>
                            <label for='giroStages'>Giro:</label>
                            <input type='number' class='numberInput' id='giroStages' name='giroStages' value='$rider->giroStages' min='0' max='255' />
                            <label for='tourStages'>Tour:</label>
                            <input type='number' class='numberInput' id='tourStages' name='tourStages' value='$rider->tourStages' min='0' max='255' />
                            <label for='vueltaStages'>Vuelta:</label>
                            <input type='number' class='numberInput' id='vueltaStages' name='vueltaStages' value='$rider->vueltaStages' min='0' max='255' />
                        </div>
                    </div>
                    <div class='submitAndError'>
                        <p class='validationError hidden'>Please enter valid details for all fields</p>
                        <input type='submit' name='submit' value='Submit' />
                    <div>
                </form>
            </div>
        </main>
        ";
    }
}
