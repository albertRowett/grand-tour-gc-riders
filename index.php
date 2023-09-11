<!-- <body>

    <h1>Website Template</h1>

</body>

</html> -->

<?php

use Collection\HTML\HeadHtml;
use Collection\HTML\PageContents\IndexHtml;
use Collection\Models\RidersModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();
$indexHtml = new IndexHtml();


$headHtml->display();
$indexHtml->display();