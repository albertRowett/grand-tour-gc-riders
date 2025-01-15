<?php

namespace Collection\HTML\PageContents;

class HeaderHtml
{
    public function display()
    {
        echo "
        <body>
            <header>
                <a href='manageTeams.php' class='settingsIcon'>
                    <img src='./images/settings.svg' alt='Settings icon' />
                </a>
                <h1>Grand Tour GC Riders</h1>
                <nav>
                    <a href='index.php'>View Riders</a>
                    <a href='addRider.php'>Add a Rider</a>
                    <a href='retired.php'>Retired Riders</a>
                </nav>
            </header>
        ";
    }
}
