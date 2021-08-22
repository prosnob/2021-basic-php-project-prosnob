
<?php include_once("../partial/header.php") ?>

<div class="container p-4">
    <div class="mb-4 d-flex justify-content-start">
        <a href="../index.php?page=education" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Exit</a>
    </div>
    <div class = "border d-flex justify-content-center">
        <h1>Data management</h1>
    </div>

    <form method="POST" action="" class="form-group col-md-4 mt-2">
    <select name="table" onchange="this.form.submit()">
        <option value="" disabled selected>--Select Table--</option>
        <option value="post">Post</option>
        <option value="user">User</option>
        <option value="category">Category</option>
    </select>
    </form>
    <?php
    if(isset($_POST["table"])){
        $table=$_POST["table"];
    }
    else{
        $table="post";
    }
    ?>

    <?php 
        if($table === "post"):

    ?>
    <div class=" mt-4 mb-4 d-flex justify-content-end">
        <a href="create_html.php" class="btn btn-primary">Add +</a>
    </div>
    <table class="table table-striped">
            <thead>
                <tr class="text-xl-center font-weight-bold"><th colspan="6">TABLE POST</th></tr>
                <tr>
                    <th>PostID</th>
                    <th>UseID</th>
                    <th>CategoryID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once("../inc/functions.php");
                    $items = selectAll("post");
                    foreach($items as $item):
                ?>
                <tr>
                    <td><?=$item['postID']?></td>
                    <td><?=$item['userID']?></td>
                    <td><?=$item['categoryID']?></td>
                    <td><?=$item['title']?></td>
                    <td><?=$item['date']?></td>
                    <td>
                        <a href="edit_html.php?id=<?=$item['postID']?>"><i class="fa fa-pencil text-info"></i></a>
                        <a href="delete.php?id=<?=$item['postID']?>&idName=postID&table=post"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    <?php elseif($table==="user"): ?>
        <div class=" mt-4 mb-4 d-flex justify-content-end">
        <a href="create_user_html.php" class="btn btn-primary">Add +</a>
    </div>
    <table class="table table-striped">
            <thead>
                <tr class="text-xl-center font-weight-bold"><th colspan="7">TABLE USER</th></tr>
                <tr>
                    <th>UseID</th>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once("../inc/functions.php");
                    $items = selectAll("user");
                    foreach($items as $item):
                ?>
                <tr>
                    <td><?=$item['userID']?></td>
                    <td><?=$item['userName']?></td>
                    <td><?=$item['email']?></td>
                    <td><?=$item['password']?></td>
                    <td><?=$item['role']?></td>
                    <td><?=$item['date']?></td>

                    <td>
                        <a href="edit_user_html.php?id=<?=$item['userID']?>"><i class="fa fa-pencil text-info"></i></a>
                        <a href="delete.php?id=<?=$item['userID']?>&idName=userID&table=user"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    <?php elseif($table==="category"):?>
        <div class=" mt-4 mb-4 d-flex justify-content-end">
        <a href="create_cate_html.php" class="btn btn-primary">Add +</a>
    </div>
    <table class="table table-striped">
            <thead>
                <tr class="text-xl-center font-weight-bold"><th colspan="4">TABLE CATEGORY</th></tr>
                <tr>
                    <th>CategoryID</th>
                    <th>CategoryName</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include_once("../inc/functions.php");
                    $items = selectAll("category");
                    foreach($items as $item):
                ?>
                <tr>
                    <td><?=$item['categoryID']?></td>
                    <td><?=$item['categoryName']?></td>
                    <td><?=$item['date']?></td>

                    <td>
                        <a href="edit_cate_html.php?id=<?=$item['categoryID']?>"><i class="fa fa-pencil text-info"></i></a>
                        <a href="delete.php?id=<?=$item['categoryID']?>&idName=categoryID&table=category"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>

    <?php endif; ?>
</div>
