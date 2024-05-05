<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
	
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
    <header>
        <h1 id="titulo">Boutique Elegance</h1>
    </header>
    <div id="container">
            <form id="form" action="cadastrar_ok.php" method="POST">
                <p id="text-form">Insira seus dados para cadastro</p>
                <div style="display: flex; gap: 4px;">
                    <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:60px;">Email</p>
                    <input type="email" name="email" class="inputs">
                </div>
                <div style="display: flex; gap: 4px;">
                    <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:60px;">Senha</p>
                    <input type="password" name="senha" class="inputs">
                </div>
                <div style="display: flex; gap: 4px;">
                    <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:60px;">Nome</p>
                    <input type="text" name="nome" class="inputs">
                </div>
                <button class="btn-op">Cadastrar</button>
                <?php
                    if(isset($_GET['errochar']))
                    echo "<p style='text-align:center; color:white;  background-color: #e64343; width:180px; margin: 4px; padding:4px; border-radius: 10px;'>Sua senha não deve conter caracteres especiais.</p>";

                    if(isset($_GET['errosql']))
                    echo "<p style='text-align:center; color:white; background-color: #e64343; width:180px; margin: 4px; padding:4px; border-radius: 10px;'>Comando SQL detectado.</p>";

                    if(isset($_GET['errocurto']))
                    echo "<p style='text-align:center; color:white; background-color: #e64343; width:180px; margin: 4px; padding:4px; border-radius: 10px;'>Sua senha deve possuir ao menos 8 caracteres.</p>";
                ?>
            </form>
    </div>
</body>
</html>