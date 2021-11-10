<?php $this->layout('layouts::website2'); ?>

<h1>Aanmelden</h1>

<p>Schrijf je hier in om toegang te krijgen tot Transformers.community!</p>

<form action="<?php echo url('register.handle')?>" method="POST">
    <div>
        <label for="username">Gebruikersnaam</label>
        <input type="name" name="username" value="<?php echo input('username')?>" class="form-control" id="email" aria-describedby="username">
        <?php if (isset( $errors['username'] ) ):?>
            <?php echo $errors['username']?>
        <?php endif;?>
    </div><br>

    <div>
        <label for="email">E-mail</label>
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
    <button type="submit">Aanmelden</button><br>

    <small id="emailHelp">Wij gebruiken uw e-mail voor inlog, tweestapsverificatie en evt. contact indien nodig. Wij zullen uw persoonlijke informatie nergens anders voor gebruiken.</small>
</form>