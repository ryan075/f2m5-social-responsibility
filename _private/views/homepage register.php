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


