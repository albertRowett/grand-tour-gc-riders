<!-- <body>

    <h1>Website Template</h1>

</body>

</html> -->

<?php

use Collection\HTML\HeadHtml;
use Collection\Models\RidersModel;

require_once 'database.php';
require_once 'vendor/autoload.php';

$ridersModel = new RidersModel($db);
$headHtml = new HeadHtml();


$headHtml->display();