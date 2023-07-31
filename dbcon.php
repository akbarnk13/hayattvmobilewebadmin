<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;

$factory = (new Factory)
->withServiceAccount('awal-f91d0-firebase-adminsdk-tzphm-de85d14964.json')
->withDatabaseUri('https://awal-f91d0-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
