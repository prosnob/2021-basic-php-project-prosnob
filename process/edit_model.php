<?php 
    include_once("../inc/functions.php");
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        if($_FILES['file']['error'] =="0" ){

            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg','jpeg','png','pdf');

            if (in_array($fileActualExt, $allowed)){
                if ($fileError===0){
                    if($fileSize < 1000000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = '../assets/images/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                    }else {
                        echo "Your file is too big!";
                    }
                }else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo "You cannot upload files of this types!";
            }

        }else{
            $fileNameNew = "";
        }

        $data = $_POST;
        $data['url_img']=$fileNameNew;
        $isUpdated = editItem($data);
        if ($isUpdated){
            header("location: data_mgmt.php");
        
        }

    }
?>