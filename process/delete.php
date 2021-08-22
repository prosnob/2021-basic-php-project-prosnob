<?php 

    include_once("../inc/functions.php");
    $id = $_GET["id"];
    $idName = $_GET['idName'];
    $table = $_GET['table'];
    if ($table === "user"){//delete img of this user from root folder
        
        $userData = selectOne($table,$id,$idName);
        foreach($userData as $user){
            $path = "../assets/profile/".$user["profile"];
            unlink($path);
            echo "delete pro";
        }
    }elseif($table === "post"){//delete img of this post from root folder
        $userData = selectOne($table,$id,$idName);
        foreach($userData as $user){
            $path = "../assets/images/".$user["img_url"];
            unlink($path);
        }
    }

    $isDeleted = delete($table,$id,$idName);//call function to delete row from table
    if ($isDeleted){
        header("location: data_mgmt.php");
        
    }

?>