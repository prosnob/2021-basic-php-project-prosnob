
<?php 
	include_once('../partial/header.php');

	include_once("../inc/functions.php");
	$invalidMessage= "";
    if(isset($_POST['submit'])){
		$isValid=logIn($_POST); // calle login function
		if(!$isValid){
			$invalidMessage = "Username or Password Invalid!"; // message to display after login is incorrect
		}
    }
?>
<!-- container -->
<div class="container mt-5">
	
	<div class="d-flex justify-content-center mt-5">
		<div class="card mt-4 w-50 border-secondary">
			<div class="card-header text-white bg-secondary border-secondary d-flex justify-content-center">
	
                <a class="navbar-brand font-weight-bold text-white" href="#"><span class="text-danger">T</span class="text-warning"><span class="text-success">O</span><span class="text-primary">D</span><span class="text-warning">A</span><span class="text-info">Y</span>-post</a><span></span>

			</div>
			<div class="card-body">
				<form  method="POST">
					<!-- useranme -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-primary border-primary"><i class="fa fa-user pr-1"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="username" required>

					</div>
					<!-- user password -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-primary border-primary"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="pwd" required>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn float-right login_btn btn-primary">Login</button>
					</div>
				</form>
				<!-- password or username error -->
				<small class="text-danger"><?=$invalidMessage;?></small>
			
			</div>
			<!-- Link to sing up -->
			<div class="card-footer bg-secondary border-secondary">
				<div class="d-flex justify-content-center text-white links">
					Don't have an account?<a href="signin_html.php">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>