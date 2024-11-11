<?php

namespace Collection\HTML;

class HeadHtml
{
    public function display(): void
    {
        echo '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Grand Tour GC Riders</title>

                <meta name="description" content="Collection of the top grand tour GC riders">
                <meta name="author" content="Albert Rowett">

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
                <link rel="stylesheet" href="css/styles.css">

                <link rel="icon" href="images/favicon.svg" sizes="192x192">
                <link rel="shortcut icon" href="images/favicon.svg">
                <link rel="apple-touch-icon" href="images/favicon.svg">

                <script defer src="js/index.js"></script>
            </head>
        ';
    }
}
