<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Consulta</title>
</head>
<body>

    

    <?php
        
        require("functions.php");
           
        $connection = ConnectDataBase();


        if ($connection == null) {
            
            DisplayErroBD();


        } else {
            

            

            

            $result = $connection->query("SELECT * FROM students");
            if ($result->num_rows == 0) {

                echo "<p>Nenhuma coluna na table encontrada!!</p>";
                echo '<a href="create.php"><div class="content">Clique aqui para redirecionar para página de criação!</div><a/>';

            } else {

                DisplayTable($result);
                

            }

            
                    

                    
                    
                    
            }

    ?>

    <button id="cadastro" class="botaoRedireciona">Criar Novo Cadastro</button>
    <button id=alterar class="botaoRedireciona">Alterar Dado</button>

    <script type="text/javascript">

        document.getElementById("cadastro").onclick = function () {
            location.href = "create.php";
        }

        document.getElementById("alterar").onclick = function () {
            location.href = "update.php";
        }

    </script>


    

    


    
</body>
</html>