<?php

$db = new PDO('mysql:host=db; dbname=grand_tour_gc_riders', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
