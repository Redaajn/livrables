<?php
require_once '../manager/LocatairesManager.php';

        $LocatairesManager = null;
        $getLocatairesManager = new LocatairesManager();    
        $getLocataires = $getLocatairesManager->getList();
        print_r(json_encode($getLocataires));
?>