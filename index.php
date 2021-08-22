<?php 

include_once('partial/header.php');
include_once('partial/navbar.php'); 

// check which page is user on

if (isset($_GET['page'])) {
    $isPageExist = file_exists('pages/' . $_GET['page'] . '.php');
    $page = 'pages/' . $_GET['page'] . '.php';
    if($isPageExist) {
        require_once($page);
    }else {
        require_once('pages/404.php');
    }
}else {
    include_once('pages/education.php');

}

include_once('partial/footer.php');
