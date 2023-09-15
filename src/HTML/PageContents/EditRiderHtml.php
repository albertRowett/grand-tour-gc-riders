<?php

namespace Collection\HTML\PageContents;

use Collection\Models\RidersModel;

class EditRiderHtml
{
    private function editRiderError() {
        if ($_GET['error'] === '1') {
            return 'An error occurred while editing the rider. Please try again later.';
        }
    }

    public function display(RidersModel $ridersModel): void
    {
        $riderId = $_GET['id'] ?? false;
        $rider = $ridersModel->getRiderById($riderId);

        echo "
        <body>
            <header>
                <h1>Grand Tour GC Riders</h1>
                <nav>
                    <a href='index.php'>View Riders</a>
                    <a href='addRider.php'>Add a Rider</a>
                </nav>
            </header>

            <main class='addRiderContainer'>
                <div class='width330'>
                    <p class='dbError'>{$this->editRiderError()}</p>
                    <h2>Edit Rider:</h2>
                    <form class='addRiderForm' method='POST'>
                        <div class='addRiderStats'>
                            <div class='statRow nameRow'>
                                <label for='name'>Name:</label>
                                <input type='text' class='textInput' id='name' name='name' value='$rider->name' placeholder='Required' />
                            </div>
                            <div class='statRow imgRow'>
                                <label for='image'>Image URL:</label><br />
                                <textarea id='image' name='image' class='imgInput' placeholder='Required'>$rider->image</textarea>
                            </div>
                            <div class='statRow'>
                                <label for='team'>Team:</label>
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
                                <label for='giroGcWins'>Giro:</label>
                                <input type='number' class='numberInput' id='giroGcWins' name='giroGcWins' value='$rider->giroGC' min='0' />
                                <label for='tourGcWins'>Tour:</label>
                                <input type='number' class='numberInput' id='tourGcWins' name='tourGcWins' value='$rider->tourGC' min='0' />
                                <label for='vueltaGcWins'>Vuelta:</label>
                                <input type='number' class='numberInput' id='vueltaGcWins' name='vueltaGcWins' value='$rider->vueltaGC' min='0' />
                            </div>
                            <p class='title'><b>Stage wins:</b></p>
                            <div class='flexrow statRow'>
                                <label for='giroStageWins'>Giro:</label>
                                <input type='number' class='numberInput' id='giroStageWins' name='giroStageWins' value='$rider->giroStages' min='0' />
                                <label for='tourStageWins'>Tour:</label>
                                <input type='number' class='numberInput' id='tourStageWins' name='tourStageWins' value='$rider->tourStages' min='0' />
                                <label for='vueltaStageWins'>Vuelta:</label>
                                <input type='number' class='numberInput' id='vueltaStageWins' name='vueltaStageWins' value='$rider->vueltaStages' min='0' />
                            </div>
                        </div>
                        <div class='submitAndError'>
                            <p class='validationError hidden'>Please add all required details (includes DoB)</p>
                            <input type='submit' name='submit' value='Submit' />
                        <div>
                    </form>
                </div>
            </main>
            
        </body>
        ";
    }
}
