<?php $this->layout('layouts::website');?>

<?php $this->start('sidebar')?>
<!-- Door sections toe te voegen aan je layout kun je deze per pagina aanpassen -->
<div class="top-10">
	<h3>Meer weten over...</h3>
	<ol>
        <li><a href="https://www.transformers.community/" target="_blank">Transformers Community</a></li>
        <li><a href="https://www.nji.nl/depressie" target="_blank">Depressie</a></li>
        <li><a href="http://www.kenniscentrum-kjp.nl/ouders-jongeren/angst/" target="_blank">Angststoornissen</a></li>
        <li><a href="http://www.kenniscentrum-kjp.nl/ouders-jongeren/gedragsstoornissen-odd-cd/" target="_blank">Gedragsstoornissen</a></li>
        <li><a href="http://www.trimbos.nl/" target="_blank">Verslaving</a></li>
	</ol>
</div>
<?php $this->stop()?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Hier kunt u zich aanmelden</title>
        <link rel="stylesheet" type="text/css" href="../../css/style2.css">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    
    <body class="align">

        <div class="grid align__item">

            <div class="register">
                <h2>Aanmelden</h2>
        <form action ="<?php echo url("register.process")?>" method="POST">
            <div class="form__field">
        <input type = "text" name = "username" placeholder = "Gebruikersnaam" required>*<br><br>
            </div>

            <div class="form__field">
        <input type = "password" name = "password" placeholder = "Wachtwoord" required>*<br><br>
            </div>

            <div class="form__field">
        <input type = "text" name = "firstname" placeholder = "Voornaam" required>*<br><br>
            </div>

            <div class="form__field">
        <input type = "text" name = "lastname" placeholder = "Achternaam" required>*<br><br>
            </div>

            <div class="form__field">
        <input type = "email" name = "email" placeholder = "E-mailadres" required>*<br><br>
            </div>

            <div class="form__field">
        <input type = "submit" value = "Aanmelden">
            </div>
            </form>
            <p>Already have an accout? <a href="/login.php">Log in</a></p>
    </div>
</div>
    </body>
</html

<!---->
  <!-- <body class="align">

        <div class="grid align__item">
      
          <div class="register">
      
            <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412"><defs><linearGradient id="a" x1="0%" y1="0%" y2="0%"><stop offset="0%" stop-color="#8ceabb"/><stop offset="100%" stop-color="#378f7b"/></linearGradient></defs><path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z"/></svg>
      
            <h2>Sign Up</h2>
      
            <form action="" method="post" class="form">
      
              <div class="form__field">
                <input type="email" placeholder="info@mailaddress.com">
              </div>
      
              <div class="form__field">
                <input type="password" placeholder="••••••••••••">
              </div>
      
              <div class="form__field">
                <input type="submit" value="Sign Up">
              </div>
      
            </form>
      
            <p>Already have an accout? <a href="#">Log in</a></p>
      
          </div>
      
        </div>
      
      </body>
</html>--> 