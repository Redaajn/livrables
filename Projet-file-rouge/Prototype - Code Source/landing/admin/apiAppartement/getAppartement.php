<?php
require_once ('../manager/AppartementsManager.php');

        $appartementManager = null;
        $getAppartementManager = new AppartementsManager();    
        $getAppartement = $getAppartementManager->getList();
        print_r(json_encode($getAppartement));
?>