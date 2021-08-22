<?php 
    include_once('../partial/header.php');

?>


<div class="container mt-4">
        <div class="mb-4 d-flex justify-content-start">
            <a href="data_mgmt.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <form action="create_model.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="desc" placeholder="Insert full description here..." required></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="file" required>
            </div>
            <legend class="col-form-label">Select Category</legend>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" id="inlineRadio1" value="1" required>
                <label class="form-check-label" for="inlineRadio1">Education</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="2">
                <label class="form-check-label" for="inlineRadio2">Sport</label>
            </div>
            <div class="form-check form-check-inline mb-2">
                <input class="form-check-input" type="radio" name="category" id="inlineRadio2" value="3">
                <label class="form-check-label" for="inlineRadio2">Health</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Add +</button>
            </div>
        </form>  
</div>