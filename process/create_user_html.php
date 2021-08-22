<?php 
    include_once('../partial/header.php');

?>


<div class="container mt-4">
        <div class="mb-4 d-flex justify-content-start">
            <a href="data_mgmt.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <form action="create_user_model.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="UserName" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pwd" placeholder="Password" required>
            </div>
            <span>Make a profile</span>
			<div class="input-group form-group">
					<input type="file" class="form-control"  name="profile">
			</div>
            <legend class="col-form-label">User Role</legend>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="admin" required>
                <label class="form-check-label" for="inlineRadio1">Admin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="guest">
                <label class="form-check-label" for="inlineRadio2">Guest</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Add +</button>
            </div>
        </form>  
</div>