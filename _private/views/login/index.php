<?php $this->layout('layouts::website2'); ?>
 

<div class="login">
    <h1>Inloggen</h1>

<p>Log in met je email en wachtwoord.</p>

<form action="<?php echo url('login.handle')?>" method="POST">

    <div>
        <label for="username">Gebruikersnaam</label>
        <input type="name" name="username" value="<?php echo input('username')?>" class="form-control" id="email" aria-describedby="username">
        <?php if (isset( $errors['username'] ) ):?>
            <?php echo $errors['username']?>
        <?php endif;?>
    </div><br>

    <div>
        <label for="email">E-mailadres</label>
        <input type="email" name="email" value="<?php echo input('email')?>" class="form-control" id="email" aria-describedby="emailHelp">
        <?php if ( isset( $errors['email'] ) ):?>
            <?php echo $errors['email']?>
        <?php endif;?>
    </div><br>

    <div>
        <label for="wachtwoord">Wachtwoord</label>
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
        <?php if ( isset( $errors['wachtwoord'] ) ):?>
            <?php echo $errors['wachtwoord']?>
        <?php endif;?>
    </div><br>
    <button type="submit">Inloggen</button><br>
</div>
</form>