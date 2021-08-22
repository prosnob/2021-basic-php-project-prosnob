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
            $item = selectOne("category",$id,"categoryID");
            
            foreach($item as $info):
        
        ?>
        <form action="edit_cate_model.php" method="POST">
            <input type="hidden"  name="id" value="<?= $info['categoryID']?>">
            <div class="form-group">
                <input type="text" class="form-control" name="cate_name" placeholder="CategoryName" value="<?= $info['categoryName']?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
        </form>  
        <?php endforeach; ?>
</div>