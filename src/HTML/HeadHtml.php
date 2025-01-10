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

                <meta name="description" content="Web app showcasing professional cycling\'s top general classification (GC) riders">
                <meta name="author" content="Albert Rowett">
                <meta property="og:title" content="Grand Tour GC Riders" />
                <meta property="og:type" content="website" />
                <meta property="og:image" content="https://opengraph.b-cdn.net/production/images/ab138268-af26-4938-9cd6-e046af4660f8.png?token=fwWCvfFeW6vDsB76Lg8GZW5mN_C9r0J7Uhp5IeFwvDw&height=627&width=1200&expires=33269219737" />
                <meta property="og:image:alt" content="Collection of the top grand tour GC riders" />
                <meta property="og:image:width" content="1200" />
                <meta property="og:image:height" content="627" />
                <meta property="og:description" content="Collection of the top grand tour GC riders" />
                <meta property="og:url" content="https://grand-tour-gc-riders.2023-bertr.dev.io-academy.uk/" />

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
                <link rel="stylesheet" href="css/styles.css">

                <link rel="icon" href="images/favicon.svg" sizes="192x192">
                <link rel="shortcut icon" href="images/favicon.svg">
                <link rel="apple-touch-icon" href="images/favicon.svg">

                <script defer src="js/script.js"></script>
            </head>
        ';
    }
}
