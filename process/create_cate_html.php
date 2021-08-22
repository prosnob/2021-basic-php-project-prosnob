<?php 
    include_once('../partial/header.php');

?>


<div class="container mt-4">
        <div class="mb-4 d-flex justify-content-start">
            <a href="data_mgmt.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <form action="create_cate_model.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="cate_name" placeholder="CategoryName" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Add +</button>
            </div>
        </form>  
</div>