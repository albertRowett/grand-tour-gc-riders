<?php

namespace Collection\HTML\PageContents;

use Collection\Models\RidersModel;

class AddRiderHtml
{
    public function display(): void
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

            <main class='addRiderContainer'>
                <div>
                    <h2>Add Rider:</h2>
                    <form class='addRiderForm' method='POST'>
                        <div class='addRiderStats'>
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
                                <label for='nationality'>Nationality:</label>
                                <input type='text' class='textInput' id='nationality' name='nationality' placeholder='Required' />
                            </div>
                            <div class='statRow'>
                                <label for='dob'>Date of Birth:</label>
                                <input type='date' id='dob' name='dob' />
                            </div>
                            <p class='title'><b>GC wins:</b></p>
                            <div class='flexrow statRow'>
                                <label for='giroGcWins'>Giro:</label>
                                <input type='number' class='numberInput' id='giroGcWins' name='giroGcWins' value='0' min='0' />
                                <label for='tourGcWins'>Tour:</label>
                                <input type='number' class='numberInput' id='tourGcWins' name='tourGcWins' value='0' min='0' />
                                <label for='vueltaGcWins'>Vuelta:</label>
                                <input type='number' class='numberInput' id='vueltaGcWins' name='vueltaGcWins' value='0' min='0' />
                            </div>
                            <p class='title'><b>Stage wins:</b></p>
                            <div class='flexrow statRow'>
                                <label for='giroStageWins'>Giro:</label>
                                <input type='number' class='numberInput' id='giroStageWins' name='giroStageWins' value='0' min='0' />
                                <label for='tourStageWins'>Tour:</label>
                                <input type='number' class='numberInput' id='tourStageWins' name='tourStageWins' value='0' min='0' />
                                <label for='vueltaStageWins'>Vuelta:</label>
                                <input type='number' class='numberInput' id='vueltaStageWins' name='vueltaStageWins' value='0' min='0' />
                            </div>
                        </div>
                        <div class='submitAndError'>
                            <p class='errorMessage hidden'>Please add all required details (includes DoB)</p>
                            <input type='submit' name='submit' value='Submit' />
                        <div>
                    </form>
                </div>
            </main>
            
        </body>
        ";
    }
}