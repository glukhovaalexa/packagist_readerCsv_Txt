<?php

use MyApp\Classes\DataManager;
use MyApp\Classes\HttpClient;

error_reporting(E_ALL);

ini_set('display_errors', 'On');

ini_set('memory_limit', '5G');

date_default_timezone_set('Europe/Kiev');

require_once __DIR__ . '/config.php';

require_once __DIR__ . '/vendor/autoload.php';

$data = new DataManager(__DIR__ . $config['dir']);
$status = new HttpClient;

$domainsRecords = $data->getAll();

arsort($domainsRecords);

require_once __DIR__ . '/view/top-500.view.php';
