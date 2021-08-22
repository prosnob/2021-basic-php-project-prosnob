

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 sticky-top">
  <a class="navbar-brand font-weight-bold" href="#"><span class="text-danger">T</span class="text-warning"><span class="text-success">O</span><span class="text-primary">D</span><span class="text-warning">A</span><span class="text-info">Y</span>-post</a><span></span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- get page by user click -->
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="?page=education">Education<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=sport">Sport</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="?page=health">Health</a>
      </li>
      
    </ul>
  </div>
  
  <?php 
    include_once("inc/functions.php");
    $account = getUserInfo();
  ?>
  <!-- if the condition is true display an user account -->
  <?php if($account["name"] !=="#"): ?> 
  <div class="d-flex justify-content-start">
        <a class="navbar-brand" href="<?=$account["linkadmin"]?>">
          <img src="<?=$account["profile"]?>" width="60" height="60" class="d-inline-block align-top rounded-circle" alt="profile-img">
          <?=$account["name"]?>
        </a>
  </div>
  <div class="d-flex justify-content-start nav-link">
        <a href="<?=$account["linkLogout"]?>">Log out</a> 
  </div>
  <!-- else user have no account -->
  <?php else: ?>
  <div class="d-flex justify-content-start nav-link">
        <a href="<?=$account["linkLogin"]?>">Log In</a>
  </div>
  <div class="d-flex justify-content-start nav-link">
        <a href="<?=$account["linkSingUp"]?>">Sing Up</a>
  </div>

  <?php endif; ?>
</nav>