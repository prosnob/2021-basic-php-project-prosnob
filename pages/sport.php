


<div class="container p-4" style="height:auto;">
    <!-- slide show -->
    <div id="carouselExampleIndicators" class="carousel" data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height:50%;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/slide_show/spo/spo-1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary">"There may be poeple that have more talent than you, but there's no excuse for anyone to work harder than you do."</h5>
                    <p>Derek Jeter</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/slide_show/spo/spo-2.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-secondary">"Sometimes you have to accept you can't win all the time."</h5>
                    <p>Lionel Messi</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/slide_show/spo/spo-3.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <<h5 class="bg-secondary">"It's hard to beat a person who never gives up."</h5>
                    <p>Bebe Ruth</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end slide show -->

    <!-- start to display post card -->
    <div class="row mt-4" >
        <?php 
            include_once("inc/functions.php");
            if (isset($_GET['page'])) { // check which page user is on
                $page = $_GET['page'];
            }else{
                $page = "education";
            }
            $items = selectByCategory("post","postID",2); //get all post by each category
            $i = 1;         //index of models
            $index=0;   //index of cards
            foreach($items as $item):       // start loop cards
                $index++;   // increment index of card
                if($index === 6){
                    $index = 1;
                }
                   
        ?>
        <!-- if index < 4 display three cards in a row -->
        <?php if($index < 4): ?>
        <div class="col-sm-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="assets/images/<?=$item['img_url']?>" alt="Card image cap" width="200px" height="200px">
                <div class="card-body">
                        <h5 class="card-title"><?=$item['title']?></h5>
                        <p class="card-text"><small class="text-muted"><?=$item['date']?></small></p>
                        <p class="card-text"><?= substr($item['description'],0,150)?>...</p>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?= $i; ?>">
                        Read more
                        </button>
                        <div class="modal fade bd-example-modal-lg" id="myModal-<?= $i; ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <?php 
                                        $user = selectAprofile($item["userID"]); // funtion to get a user name and profile
                                        foreach ($user as $info){
                                            $profile = $info["profile"];
                                            $userName = $info["userName"];
                                        }
                                            
                                    ?>
                                    <div class="d-flex justify-content-start">
                                        <a class="navbar-brand" href="">
                                            <img src="assets/profile/<?=$profile?>" width="70" height="70" class="d-inline-block align-top rounded-circle" alt="profile-img">
                                                
                                        </a>
                                    </div>
                                    

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <h5 class="modal-title m-2" id="exampleModalLongTitle">Title: <?=$item['title']?></h5>
                                <img class="card-img-top" src="assets/images/<?=$item['img_url']?>" alt="Card image cap">
                                <p class="card-text ml-2"><small class="text-muted"> Public date: <?=$item['date']?></small></p>
                                <h6 class="card-text ml-2 font-weight-fold font-italic">Created by :<small class="text-muted"> <?=$userName?></small></h6>
                                <div class="modal-body">
                                <?= $item['description']?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- if index < 4 display two cards in a row -->
        <?php else:?>
        <div class="col-sm-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="assets/images/<?=$item['img_url']?>" alt="Card image cap" width="200px" height="300px">
                <div class="card-body">
                        <h5 class="card-title"><?=$item['title']?></h5>
                        <p class="card-text"><small class="text-muted"><?=$item['date']?></small></p>
                        <p class="card-text"><?= substr($item['description'],0,150)?>...</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?= $i; ?>">
                        Read more
                        </button>
                        <div class="modal fade bd-example-modal-lg" id="myModal-<?= $i; ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <?php 
                                        $user = selectAprofile($item["userID"]); // funtion to get a user name and profile
                                        foreach ($user as $info){
                                            $profile = $info["profile"];
                                            $userName = $info["userName"];
                                        }
                                    ?>
                                    <div class="d-flex justify-content-start">
                                        <a class="navbar-brand" href="">
                                            <img src="assets/profile/<?=$profile?>" width="70" height="70" class="d-inline-block align-top rounded-circle" alt="profile-img">
                                        </a>
                                    </div>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <h5 class="modal-title m-2" id="exampleModalLongTitle">Title: <?=$item['title']?></h5>
                                <img class="card-img-top" src="assets/images/<?=$item['img_url']?>" alt="Card image cap">
                                <p class="card-text ml-2"><small class="text-muted"> Public date: <?=$item['date']?></small></p>
                                <h6 class="card-text ml-2 font-weight-fold font-italic">Created by :<small class="text-muted"> <?=$userName?></small></h6>
                                <div class="modal-body">
                                <?= $item['description']?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php 
        endif;
        $i++; // increment index of model
        endforeach; // end loop card
        
        ?>
    </div>
    <!-- pagination -->
    <div class="d-flex justify-content-center">
            <ul class="pagination">
               <?php
                    $pages = getTotalPage("post","postID",2);
                    for($i = 1; $i <= $pages + 1; $i++):
               ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page?>&numpage=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor ?>            
            </ul>
    </div> 
</div>
