<?php 



if (isset($_SESSION)) {

    echo '<script>
          window.alert("Iniciado!")
          </script>
    
    
    
    ';

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Document</title>
</head>
<body>

    <div id="backgroundForm">
        <form action="login.php" method="post">
            <p>
                <label for="username">Usuário</label>
                <input type="text" name="username" id="idUsername" required>
            </p>
            <p>
                <label for="password">Senha</label>
                <input type="password" name="password" id="idPassword" required>
            </p>
            <p>
                <button type="submit" value="Submit">Login</button>
            </p>
        </form>
    </div>
    
</body>
</html>