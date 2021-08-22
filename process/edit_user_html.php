<?php 
    include_once('../partial/header.php');

?>

<div class="container mt-4">
        <div class="mb-4 d-flex justify-content-start">
            <a href="data_mgmt.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <?php 
        
            include_once("../inc/functions.php");
            $id=$_GET["id"];
            $item = selectOne("user",$id,"userID");
            $admin_checked = "";
            $guest_checked = "";
            
            foreach($item as $info): // check account  user is a admin or guest
                if($info["role"]== "admin"){
                    $admin_checked = "checked";
                }
                else{
                    $guest_checked = "checked";
                }
        
        ?>
        <form action="edit_user_model.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?= $info["userID"] ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="UserName" value="<?= $info["userName"] ?>" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $info["email"] ?>" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pwd" placeholder="Password" value="<?= $info["password"] ?>" required>
            </div>
            <span>Make a profile</span>
			<div class="input-group form-group">
					<input type="file" class="form-control"  name="profile">
			</div>
            <legend class="col-form-label">User Role</legend>
            <!-- admin radio -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" <?= $admin_checked ?> id="inlineRadio1" value="admin">
                <label class="form-check-label" for="inlineRadio1">Admin</label>
            </div>
            <!-- guest radio -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" <?= $guest_checked ?> id="inlineRadio2" value="guest">
                <label class="form-check-label" for="inlineRadio2">Guest</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
        </form>
        <?php endforeach; ?>  
</div>