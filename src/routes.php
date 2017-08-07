<?php
$routes = [
    'metadata',
    'addDataToDataset',
    'deleteDataFromDataset',
    'getAllDatasets',
    'getSingleDataset',
    'importFromS3',
    'getAllImports',
    'getSingleImport',
    'createForecastSession',
    'createImpactSession',
    'deleteSession',
    'deleteAllSession',
    'getAllSession',
    'getSessionResult',
    'getSingleSession',
    'getSessionStatus'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

