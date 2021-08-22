
<?php 

include_once('../partial/header.php');

include_once("../inc/functions.php");

// avariable to display error
$name_error = "";
$email_error = "";
$pass_error = "";
$pro_error = "";

if($_SERVER['REQUEST_METHOD']==='POST'){
	$userInfo = $_POST;
	$isvalid = signIn($userInfo);
	//gave message after have an error
	$name_error = $isvalid["name_error"];
	$email_error = $isvalid["email_error"];
	$pass_error = $isvalid["pass_error"];
	$pro_error = $isvalid["profile_error"];
}
?>
<!--container-->
<div class="container mt-5">
	<div class="d-flex justify-content-center mt-5">
		<div class="card mt-4 w-50 border-secondary">
			<div class="card-header text-white bg-secondary border-secondary d-flex justify-content-center">
                <a class="navbar-brand font-weight-bold text-white" href="#"><span class="text-danger">T</span class="text-warning"><span class="text-success">O</span><span class="text-primary">D</span><span class="text-warning">A</span><span class="text-info">Y</span>-post</a><span></span>
			</div>
			<div class="card-body">
				<form  method="POST" enctype="multipart/form-data">
					<div class="d-grid">
						<!-- username -->
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary"><i class="fa fa-user pr-1"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" name="username" required>

						</div>
						<small class="text-danger"><?=$name_error;?></small>
					</div>
					<!-- email -->
					<div class="d-grid mt-3">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" class="form-control" placeholder="E-mail" name="email" required>
						</div>
						<small class="text-danger"><?=$email_error;?></small>
					</div>
					<!-- password -->
					<div class="input-group form-group mt-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-primary border-primary"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="pwd" required>
					</div>
					<!-- conrmfirm password -->
					<div class="d-grid">
						<div class="input-group ">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" class="form-control m-0" placeholder="Confirm password" name="con-pwd" required>
						</div>
						<small class="text-danger"><?=$pass_error;?></small>
					</div>
					<!-- Choose a profile -->
					<span>Make a profile</span>
					<div class="input-group form-group">
						<input type="file" class="form-control"  name="profile">
					</div>
					<small class="text-danger"><?=$pro_error;?></small>
					<div class="form-group">
						<button type="submit" name="submit" class="btn float-right login_btn btn-primary">Sign In</button>
					</div>
					
				</form>
				</div>
				<!-- Link to Login -->
				<div class="card-footer bg-secondary border-secondary">
				<div class="d-flex justify-content-center text-white links">
					Aready have an account?<a href="login_html.php">Long In</a>
				</div>
			
			</div>
		</div>
	</div>
</div>
