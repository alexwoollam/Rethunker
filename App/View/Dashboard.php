<?php
use App\Controller\Users\Cookie;
use App\Controller\Users\User;

$user_is_logged_in = ( new Cookie )->UserIsLoggedIn();
$user_name = false;
$email_address = false;

if($user_is_logged_in){ 
    $user = ( new User );
    $user_name = $user->getName();
    $email_address = $user->getEmail();
}
?>

<div class="container w-50 mt-5">
 <div class="row">
    <div class="col">
        <form method="post" action="">
            <div class="form-group">
          
          
            <label for="email">Email</label>
            <input class="form-control" name="email" placeholder="email" type='text' value="<?php echo $email_address; ?>">
            <br/>
            <label for="name">Name</label>
            <input class="form-control" id="name" placeholder="name" name="name" type="text" value="<?php echo $user_name; ?>">
            <br/>
            <button class="btn btn-primary" type='submit'>Submit</button>
        </form>
    </div>
 </div>
</div>