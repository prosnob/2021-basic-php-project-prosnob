<?php

include_once("../inc/functions.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $fileNameNew=uploadProfile($_FILES['profile']);
    $data = $_POST;
    $data['pro_url']=$fileNameNew;
    $isUserCreated = createUser($data);
    if ($isUserCreated){
        header("location: data_mgmt.php");
    }

}