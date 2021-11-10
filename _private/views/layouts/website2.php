<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Transformers Community</title>
        <link rel="stylesheet" href="/css/style2.css">
    <style>
        body {
            margin: 0;
        }
    #dashboard {
        display: grid;
        height: 100vh;
        grid-template-columns: 200px 1fr 200px;
        grid-template-rows: 50px 1fr 50px;
    }

    .header {
        grid-row: 1;
        grid-column-start: 1;
        grid-column-end: 4;
    }

    .nav {
        grid-row: 2;
        grid-column-start: 1;
        grid-column-end: 2;
    }

    .content {
        grid-row: 2;
        grid-column-start: 2;
        grid-column-end: 3;
    }

    .footer {
        grid-row: 3;
        grid-column-start: 1;
        grid-column-end: 4;
    }
    </style>
</head>
<body>

<div id="dashboard">
    <div class=" header"></div>
    <div class=" nav">
    <?php if ( $this->section( 'navigation' ) ): ?>
			<?php echo $this->section( 'navigation' ) ?>
		<?php else: ?>
			<?php echo $this->fetch( '_navigation' ) ?>
		<?php endif ?>
    </div>
    <div class=" content">
    <section class="content">
			<?php echo $this->section( 'content' ) ?>
        </section>
    </div>
    <div class=" footer">
        <p>&copy; 2021</p>
    </div>
</div>


</body>
</html>

