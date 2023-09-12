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
        
            <form class='addRiderForm' method='POST'>
                <h2>Add Rider:</h2>
                <div class='flexrow'>
                    <label for='name'>Name:</label>
                    <input type='text' id='name' name='name' placeholder='Required' />
                </div>
                <label for='image'>Image:</label><br />
                <textarea id='image' name='image' placeholder='Required'></textarea>
                <div class='flexrow'>
                    <label for='team'>Team:</label>
                    <input type='text' id='team' name='team' placeholder='Required' />
                </div>
                <div class='flexrow'>
                    <label for='nationality'>Nationality:</label>
                    <input type='text' id='nationality' name='nationality' placeholder='Required' />
                </div>
                <div class='flexrow'>
                    <label for='dob'>Date of Birth:</label>
                    <input type='date' id='dob' name='dob' />
                </div>
                <p><b>GC wins:</b></p>
                <div class='flexrow'>
                    <label for='giroGcWins'>Giro:</label>
                    <input type='number' class='numberInput' id='giroGcWins' name='giroGcWins' value='0' min='0' />
                    <label for='tourGcWins'>Tour:</label>
                    <input type='number' class='numberInput' id='tourGcWins' name='tourGcWins' value='0' min='0' />
                    <label for='vueltaGcWins'>Vuelta:</label>
                    <input type='number' class='numberInput' id='vueltaGcWins' name='vueltaGcWins' value='0' min='0' />
                </div>
                <p><b>Stage wins:</b></p>
                <div class='flexrow'>
                    <label for='giroStageWins'>Giro:</label>
                    <input type='number' class='numberInput' id='giroStageWins' name='giroStageWins' value='0' min='0' />
                    <label for='tourStageWins'>Tour:</label>
                    <input type='number' class='numberInput' id='tourStageWins' name='tourStageWins' value='0' min='0' />
                    <label for='vueltaStageWins'>Vuelta:</label>
                    <input type='number' class='numberInput' id='vueltaStageWins' name='vueltaStageWins' value='0' min='0' />
                </div>
                <input type='submit' name='submit' value='Submit' />
            </form>
            
        </body>
        ";
    }
}