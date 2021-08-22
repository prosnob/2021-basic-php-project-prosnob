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
            $item = selectOne("post",$id,"postID");
            $edu_checked = "";
            $sport_checked = "";
            $health_checked = "";
            
            foreach($item as $info):
                if($info["categoryID"]== "1"){
                    $edu_checked = "checked";
                }
                elseif ($info["categoryID"]=="2"){
                    $sport_checked = "checked";
                }
                else{
                    $health_checked = "checked";
                }
        
        ?>
        <form action="edit_model.php" method="POST" enctype="multipart/form-data">
            <input type="hidden"  name="id" value="<?= $info["postID"] ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" value="<?= $info["title"] ?>" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="desc" placeholder="Insert full description here..." required><?= $info["description"] ?></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="file"><?= $info["img_url"] ?>
            </div>
            <legend class="col-form-label">Select Category</legend>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" <?= $edu_checked?> id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Education</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" <?= $sport_checked?> id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">Sport</label>
            </div>
            <div class="form-check form-check-inline mb-2">
                <input class="form-check-input" type="radio" name="category" <?= $health_checked?> id="inlineRadio2" value="3">
                <label class="form-check-label" for="inlineRadio2">Health</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
        </form>
        <?php endforeach;?>
</div>