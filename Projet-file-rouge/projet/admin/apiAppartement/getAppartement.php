<?php
require_once (__DIR__.'/..admin/manager/AppartementManager.php');

        $appartementManager = null;
        $getappartementManager = new appartementManager();    
        $getappartement = $getappartementManager->getList();
        print_r(json_encode($getappartement));
?>