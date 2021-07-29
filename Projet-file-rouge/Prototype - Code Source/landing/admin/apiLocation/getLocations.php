<?php
require_once '../manager/LocationsManager.php';

        $LocationsManager = null;
        $getLocationsManager = new LocationsManager();    
        $getLocations = $getLocationsManager->getList();
        print_r(json_encode($getLocations));
?>