
<?php

    include_once("../inc/functions.php");
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $data = $_POST;
        print_r($data);
        $isCateEdited = editCategory($data);
        if ($isCateEdited){
            header("location: data_mgmt.php");
        }

    }