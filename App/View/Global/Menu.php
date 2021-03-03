<?php

use App\Controller\Users\Cookie;
use App\Controller\Users\User;
use App\Helpers\Functions;

$user_is_logged_in = ( new Cookie )->UserIsLoggedIn();
$user_name = false;
if($user_is_logged_in){ 
  $user_name = ( new User )->getName();
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="/public/img/white-logo.svg" alt="logo" style="height:30px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php if( !$user_is_logged_in ){ ?>
      <li class="nav-item <?php ( new Functions )->currentPage('/login');?>" >
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item <?php ( new Functions )->currentPage('/register');?>">
        <a class="nav-link" href="/register">Register</a>
      </li>
      <?php } ?>
      <?php if( $user_is_logged_in ){ ?>
      <li class="nav-item <?php ( new Functions )->currentPage('/dashboard');?>" >
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item <?php ( new Functions )->currentPage('/page-edit');?>" >
        <a class="nav-link" href="/page-edit">Pages</a>
      </li>
      <li class="nav-item <?php ( new Functions )->currentPage('/menu-edit');?>" >
        <a class="nav-link" href="/menu-edit">Menus</a>
      </li>
      <li class="nav-item <?php ( new Functions )->currentPage('/options-edit');?>" >
        <a class="nav-link" href="/options-edit">Options</a>
      </li>
      <li class="nav-item <?php ( new Functions )->currentPage('/users-edit');?>" >
        <a class="nav-link" href="/users-edit">Users</a>
      </li>
      <?php } ?>
    </ul>
    
    <?php if( $user_name ){ ?>
      <ul class="navbar-nav ml-auto">
        <a class="navbar-brand" href="#"><?php echo 'Welcome ' . $user_name; ?></a>
        <li class="nav-item <?php ( new Functions )->currentPage('/logout');?>" >
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
      <?php } ?>
  </div>
</nav>