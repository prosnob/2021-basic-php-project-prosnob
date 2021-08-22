<?php

include_once("../inc/functions.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $data = $_POST;
    print_r($data);
    $isCateCreated = create_category($data);
    if ($isCateCreated){
        header("location: data_mgmt.php");
    }

}