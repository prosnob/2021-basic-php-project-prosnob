<?php

include_once("../inc/functions.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $fileNameNew=uploadProfile($_FILES['profile']);// function to upload img
    $data = $_POST;
    $data['pro_url']=$fileNameNew;
    $isUserEdited = editUser($data);// funtion to update user
    if ($isUserEdited){
        header("location: data_mgmt.php");
    }
}