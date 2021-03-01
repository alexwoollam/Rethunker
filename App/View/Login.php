<?php

$email = $post['email'];
$email_address = $post['sent_email'];
$auth = $post['authenticated'];
$email_warning = '<div class="alert alert-danger" role="alert">Sorry, I could not find this email in our systems. <a href="/register" class="alert-link">Would you like to register?</a></div>';
$no_user_warning = '<div class="alert alert-warning" role="alert">Looks like this is a fresh install. <a href="/register" class="alert-link">Would you like to register?</a></div>';;
$password_warning = '<div class="alert alert-danger" role="alert">Sorry, this password is not correct <a href="/register" class="alert-link">Would you like to reset it?</a></div>';
$please_login = '<div class="alert alert-success" role="alert">Welome, please login below.</div>';
?>

<div class="container mt-5 w-25">
    <div class="logo mb-5 login fas"></div>
    <?php if( $no_users ){ echo $no_user_warning; } ?>
    <?php if( $email === false ){ echo $email_warning; } ?>
    <?php if( $email === true && $auth === false ){ echo $password_warning; } ?>
    <form method="post" action="">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" <?php if( $email_address ){ echo 'value="'.$email_address.'"'; }else{ echo 'placeholder="email"'; } ?> type='text'>
            <br/>
            <label for="password">Password</label>
            <input class="form-control" id="password" placeholder="password" name="password" type='password'>
            <br/>
            <button class="btn btn-primary" type='submit'>Submit</button>
        </div>
    </form>
</div>