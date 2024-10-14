<?php

namespace Collection\HTML\PageContents;

class AddRiderHtml
{
    private function addRiderError()
    {
        if ($_GET['error'] === '1') {
            return 'An error occurred while adding the rider. Please try again later.';
        }
    }

    public function display(): void
    {
        echo "
            <main class='riderFormContainer'>
                <div class='width330'>
                    <p class='dbError'>{$this->addRiderError()}</p>
                    <h2>Add Rider:</h2>
                    <form class='riderForm' method='POST'>
                        <div class='riderStats'>
                            <div class='statRow nameRow'>
                                <label for='name'>Name:</label>
                                <input type='text' class='textInput' id='name' name='name' placeholder='Required' />
                            </div>
                            <div class='statRow imgRow'>
                                <label for='image'>Image URL:</label><br />
                                <textarea id='image' name='image' class='imgInput' placeholder='Required'></textarea>
                            </div>
                            <div class='statRow'>
                                <label for='team'>Team:</label>
                                <input type='text' class='textInput' id='team' name='team' placeholder='Required' />
                            </div>
                            <div class='statRow'>
                                <label for='nation'>Nation:</label>
                                <input type='text' class='textInput' id='nation' name='nation' placeholder='Required' />
                            </div>
                            <div class='statRow'>
                                <label for='dob'>Date of Birth:</label>
                                <input type='date' id='dob' name='dob' />
                            </div>
                            <p class='title'><b>GC wins:</b></p>
                            <div class='flexrow statRow'>
                                <label for='giroGc'>Giro:</label>
                                <input type='number' class='numberInput' id='giroGc' name='giroGc' value='0' min='0' />
                                <label for='tourGc'>Tour:</label>
                                <input type='number' class='numberInput' id='tourGc' name='tourGc' value='0' min='0' />
                                <label for='vueltaGc'>Vuelta:</label>
                                <input type='number' class='numberInput' id='vueltaGc' name='vueltaGc' value='0' min='0' />
                            </div>
                            <p class='title'><b>Stage wins:</b></p>
                            <div class='flexrow statRow'>
                                <label for='giroStages'>Giro:</label>
                                <input type='number' class='numberInput' id='giroStages' name='giroStages' value='0' min='0' />
                                <label for='tourStages'>Tour:</label>
                                <input type='number' class='numberInput' id='tourStages' name='tourStages' value='0' min='0' />
                                <label for='vueltaStages'>Vuelta:</label>
                                <input type='number' class='numberInput' id='vueltaStages' name='vueltaStages' value='0' min='0' />
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
