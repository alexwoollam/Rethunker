<?php

use App\Controller\Users\Cookie;
use App\Controller\Users\User;

function currentPage( $this_page ){
  if ( $this_page === $_SERVER['REQUEST_URI'] ) {
    echo 'active';
  }
}

$user_is_logged_in = ( new Cookie )->UserIsLoggedIn();
$user_name = false;
if($user_is_logged_in){ 
  $user_name = ( new User )->getName();
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ReCMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php if( $user_name ){ ?>
        <p><?php echo 'welcome ' . $user_name; ?></p>
      <?php } ?>
      <li class="nav-item <?php currentPage('/');?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if( !$user_is_logged_in ){ ?>
      <li class="nav-item <?php currentPage('/login');?>" >
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item <?php currentPage('/register');?>">
        <a class="nav-link" href="/register">Register</a>
      </li>
      <?php } ?>
      <?php if( $user_is_logged_in ){ ?>
      <li class="nav-item <?php currentPage('/dashboard');?>" >
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item <?php currentPage('/logout');?>" >
        <a class="nav-link" href="/logout">Logout</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>