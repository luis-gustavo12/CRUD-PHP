<?php 


session_start();
if (isset($_SESSION["name"])) {

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    
    
    <title>Document</title>
</head>
<body>


    <h1>Menu de Criação de Tabelas</h1>

    <form action="createform.php" autocomplete="off" method="POST" id="formInput">
        <p id ="pNome">
            <label for="idNome">Nome: </label>
            <input required type="text" name="nome" id="idNome"></p>
        <p id = "pData">
            <label for="idData">Data de Nascimento: </label>
            <input required type="date" name="data" id="idData"></p>
        <p id = "pSala">
            <label for="idSala">Sala:</label> 
            <input required type="text" name="sala" id="idSala"></p>
        <p id = "pCPF">
            <label for="idCPF">CPF:</label>
            <input required type="text" name="cpf" id="idCPF"></p>

        <p>
            <input type="submit" name="submit" ></p>
    </form>

   

    

    <script src="../js/index.js"></script>

</body>
</html>


<?php 

} else {

    header("Location: /pages/home.php");
    exit();

}


?>