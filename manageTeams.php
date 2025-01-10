<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\FooterHtml;
use Collection\HTML\PageContents\HeaderHtml;
use Collection\HTML\PageContents\ManageTeamsHTML;

require_once 'vendor/autoload.php';

$headHtml = new HeadHtml();
$headerHtml = new HeaderHtml();
$manageTeamsHtml = new ManageTeamsHTML();
$footerHtml = new FooterHtml();

// Display page
$headHtml->display();
$headerHtml->display();
$manageTeamsHtml->display();
$footerHtml->display();
