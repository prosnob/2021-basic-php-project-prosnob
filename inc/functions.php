<?php
//==============TO ACCESS TO DATABASE=================//
include_once("database.php");

//==============A FUNCTION TO GET ALL DATA FROM TABLE================// 
function selectAll($table){
    return db()->query("SELECT * FROM $table");
}
//==============A FUNCTION TO GET ALL DATA FROM EACH CATEGORY================// 
function selectByCategory($table,$idName,$categoryName){
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else{
        $page = "education";
    }
    if ($page == "education"){//Result per pages
        $result = 9;
    }elseif($page == "sport"){
        $result = 8;
    }else {
        $result = 7;
    }
    $page = 0; // check for set pages
    isset($_GET['numpage']) ? $page = $_GET['numpage'] : $page = 0;

    if($page > 1){
        $start = ($page * $result) - $result;
    }else {
        $start = 0;

    }

    $data = db()->query("SELECT * FROM $table WHERE categoryID = $categoryName ORDER BY $idName DESC LIMIT $start, $result");

    return $data;
}

//===============A FUNCTION TO GET A TOTAL PAGE=============================//
function getTotalPage($table,$idName,$categoryName) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else{
        $page = "education";
    }

    if ($page == "education"){//Result per pages
        $result = 9;
    }elseif($page == "sport"){
        $result = 8;
    }else {
        $result = 7;
    }

    // Check for set pages
    $page = 0;
    isset($_GET['numpage']) ? $page = $_GET['numpage'] : $page = 0;

    // check for page 1

    if($page > 1) {
        $start = ($page * $result) - $result;
    }else {
        $start = 0;
    }
    
  $data = db()->query("SELECT * FROM $table WHERE categoryID = $categoryName ORDER BY $idName DESC");
  // Get total page 
  $numRow = $data->num_rows;

  $totalPage = $numRow / $result;
  return $totalPage;
}


//==============A FUNCTION TO GET A ROW OF DATA FROM TABLE================// 
function selectOne($table,$id,$idName){
    return db()->query("SELECT * FROM $table WHERE $idName ='$id'");

}
//==============A FUNCTION TO DELETE A ROW FROM TABLE================// 
function delete($table,$id,$idName){
    return db()->query("DELETE FROM $table WHERE $idName = '$id'");
}
//==============A FUNCTION TO POST THE NEWS  FOR EACH CATEGORY================//
function createItem($value){
    $title=$value['title'];
    $desc=$value['desc'];
    $url_img = $value['url_img'];
    $category  = intval($value['category']);
    date_default_timezone_set('Asia/Phnom_Penh');
    $dateTime = strval(date('l, jS \of F Y h:i:s A'));
    return db()->query("INSERT INTO post(userID,categoryID,title,description,img_url,date) VALUES (1,'$category','$title','$desc','$url_img','$dateTime')");

}
//==============A FUNCTION TO CREATE A USER BY ADMIN================// 
function createUser($value){
    $userName = $value['username'];
    $email = $value['email'];
    $pwd = password_hash($value['pwd'], PASSWORD_DEFAULT);
    $role = $value['role'];
    $profile = $value['pro_url'];
    if ($profile === ""){
        $profile = "profile.jpg";
    }
    return db()->query("INSERT INTO user(userName,email,password,role,profile) VALUES ('$userName','$email','$pwd','$role','$profile')");
}
//==============A FUNCTION TO CREATE CATEGORY================// 
function create_category($value){
    $cate_name = $value['cate_name'];
    return db()->query("INSERT INTO category(categoryName) VALUES ('$cate_name')");
}
//==============A FUNCTION EDIT OR UPDATE A POST================// 
function editItem($value){
    $id = $value['id'];
    $title=$value['title'];
    $desc=$value['desc'];
    $url_img = $value['url_img'];
    if ($url_img == ""){ // check if user chage img of post
        $item = selectOne("post",$id,"postID");
        foreach($item as $info){
            $old_img_url = $info["img_url"];
        }
        $url_img = $old_img_url;
    }
    $category  = intval($value['category']);
    return db()->query("UPDATE post SET userID=1,categoryID='$category',title='$title',description='$desc',img_url='$url_img' WHERE postID ='$id'");
}
//==============A FUNCTION TO EDIT OR UPDATE A USER================// 

function editUser($value){
    $id = $value['id'];
    $username = $value['username'];
    $email = $value['email'];
    $role = $value['role'];
    $profile = $value['pro_url'];
    $user = selectOne("user",$id,"userID");
    foreach($user as $info){
        $oldpass = $info["password"];
    }
  

    if ($value['pwd']===$oldpass){// check if you don't change password
        $pwd =$value['pwd'];
    }else { // if you user change password
        $pwd = password_hash($value['pwd'], PASSWORD_DEFAULT);
    }
    if ($profile ===""){//if user don't change profile
        return db()->query("UPDATE user SET userName='$username',email='$email',password='$pwd',role='$role' WHERE userID='$id'");
    }else { // if user change their profile
        return db()->query("UPDATE user SET userName='$username',email='$email',password='$pwd',role='$role',profile='$profile' WHERE userID='$id'");
    }
    
}

//==============A FUNCTION TO EDIT OR UPDATE A CATEGORY================// 

function editCategory($value){
    $id = $value['id'];
    $cateName = $value['cate_name'];
    return db()->query("UPDATE category SET categoryName='$cateName' WHERE categoryID='$id'");
}
//==============A FUNCTION TO VERIFY A USER LOGIN================// 

function logIn($value){
    $allUsers = selectAll("user");
    $userName = $value["username"];
    $pwd = $value["pwd"];
    foreach($allUsers as $user){
        if ($user['userName']===$userName and password_verify($pwd,$user['password'])){
            $userID = $user['userID'];
            session_start();
            $_SESSION['userId']=$userID; // tell session that user is login
            header("location: ../index.php");
        }  
    }
    return false;
}

//==============A FUNCTION TO CREATE A USER BY USER SIGN IN================// 


function signIn($value){
    $regex_name = "/^[a-zA-Z\d\._]{2,}+$/";
    $regex_email = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,}+$/";
    $regex_pwd = "/^[a-zA-Z\d\._]{6,25}+$/";
    $error = array("name_error"=>"", "email_error"=>"", "pass_error"=>"","profile_error"=>"");
    $isValue = true; 
    // chech if user input is correct to regex or not
	if (!preg_match($regex_name,$value['username'])){
        $isValue = false;
		$error["name_error"] = "Name should not contain space and longer than 1 character!";	
	}

	if (!preg_match($regex_email,$value['email'])){
        $isValue = false;
        $error["email_error"] = "Please enter a correct form of email!";
	}

    if($value["pwd"]!=$value["con-pwd"]){
        $isValue = false;
        $error["pass_error"] = "Password and Confirm password should be the same!";
    }else {
        if (!preg_match($regex_pwd,$value['pwd'])){
            $isValue = false;
            $error["pass_error"] = "Put a strong one (Longer than 5 characters or numbers)!";
        }
    }
    $fileNameNew=uploadProfile($_FILES['profile']);
    if ($fileNameNew==1){
        $error["profile_error"] = "Your file is too big!";
        $isValue = false;
    }elseif($fileNameNew ==2){
        $error["profile_error"] = "There was an error uploading your file!";
        $isValue = false;
    }elseif($fileNameNew==3){
        $error["profile_error"] = "You cannot upload files of this types!";
        $isValue = false;
    }
    // if user input is not correct
    if($isValue){
        $data = $_POST;
        $data['role'] = "guest";
        $data['pro_url']=$fileNameNew;
        $isCreated = createUser($data);
        if ($isCreated){
            header("location: login_html.php");
        }
    }else {
        return $error; // return an error back to form
    }

}

//==============A FUNCTION TO GET A USER INFORMATION================// 

function getUserInfo(){
    $activeUser = array("name"=>"#","linkadmin"=>"#","profile"=>"","linkSingUp"=>"#","linkLogin"=>"#","linkLogout"=>"#");
    session_start();
    if(isset($_SESSION['userId'])){ //check is user login ?
        $userInfo = selectOne("user",intval($_SESSION['userId']),"userID");
        foreach($userInfo as $user){//check role of user
            $activeUser["name"] = $user["userName"];
            $activeUser["linkLogout"] = "process/logout.php";
            $activeUser["profile"] = "assets/profile/".$user["profile"];
            if ($user["role"] ==="admin"){
                $activeUser["linkadmin"]= "process/data_mgmt.php";
            }
        }
    }else {
        $activeUser["linkLogin"]= "process/login_html.php";
        $activeUser["linkSingUp"]= "process/signin_html.php";
    }
    return $activeUser; // return all infomation of user login
}
//==============A FUNCTION TO UPLOAD A USER PROFILE================// 

function uploadProfile($value){
    if($value['error'] =="0" ){
        $file = $value;
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf');

        if (in_array($fileActualExt, $allowed)){
            if ($fileError===0){
                if($fileSize < 100000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = '../assets/profile/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                }else {
                    $fileNameNew = 1;
                }
            }else {
                $fileNameNew = 2;
            }
        } else {
            $fileNameNew = 3;
        }
    }else{
        $fileNameNew = "";
    }
    return $fileNameNew;
}

//==============A FUNCTION TO GET A PROFILE OF USER================// 
function selectAprofile($id){
    return db()->query("SELECT userName,profile FROM user WHERE userID ='$id'");

}