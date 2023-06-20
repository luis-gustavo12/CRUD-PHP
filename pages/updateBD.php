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
    
    

    <?php 
    

    require("functions.php");

    $statusEnvio = false;

    if (isset($_POST)) {


        $opcaoTroca = $_POST["valorTrocaBD"];
        
        $connection = ConnectDataBase();

        if ($connection == null) {
            DisplayErroBD();
        }

        

        else {

            $queryString = "";
            

            switch ($opcaoTroca) {


                case "CPF":
                    $queryString = "UPDATE students SET CPF = " . $_POST["envioTroca"] . " WHERE CPF = " . $_POST["selectRegistros"] . ";";
                    $connection->query($queryString);
                    $statusEnvio = true;
                    break;

                case "nome":         
                    $queryString = "UPDATE students SET Name='" . $_POST["envioTroca"] . "' WHERE CPF = '" . $registro . "';";
                    $connection->query($queryString);
                    $statusEnvio = true;
                    break;


                case "sala":
                    $queryString = sprintf('UPDATE studensts SET Classroom = "%s" WHERE CPF = %s;', $_POST["envioTroca"], $_POST["selectRegistro"]);
                    $connection->query($queryString);
                    $statusEnvio = true;
                    break;


                // TODO: Validar input de data de nascimento
                case "dataNasc":
                    break;

                default:
                    break;

            }

        }
                

    }


    if ($statusEnvio == true) {

        echo '
        <script>
            window.alert("Dados alterados com sucesso!!")
        
        </script>';

        sleep(5);
        echo '
        <script>
            
            window.location.replace("../index.html")
        </script>
        ';
        

    }


    
    ?>


</body>
</html>