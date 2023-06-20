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

        try {

            require("functions.php");
        
        
            if (isset($_POST)) {


                $erro = "";


                $nome = $_POST["nome"];
                $data = $_POST["data"];
                $sala = $_POST["sala"];
                $cpf = $_POST["cpf"];     

                $status = true;

                if (strlen($nome) > 40 || ValidaNome($nome) == false) {
                    $erro += "<p>Erro no preenchimento do Nome!! </p>";
                    $status = false;
                    
                }

                if (ValidaData($data)  == false) {

                    $erro .= "<p>Erro no preenchimento de Data!! </p>";
                    $status = false;

                }

                if (strlen($sala) != 3 || ValidaSala($sala) == false) {
                    $erro .= "<p>Erro no preenchimento da Sala!! </p>";
                    $status = false;

                }

                if (ValidaCPF($cpf) == false) {
                    $erro .= "<p>Erro no preenchimento do CPF</p";
                    $status = false;
                } 




                if ($status ) {

                    echo "<p>Dados cadastrados com sucesso!!</>";
                    
                    echo "<div><button onclick = widow.location.href='create.php'>Cadastrar novo aluno</button>";
                    echo "<button onclick = window.location.href='../index.html'>Voltar ao menu princippal</button></div>";


                } else {

                    echo "<h3> Erro:" . $erro . "</h3>";
                    echo "<button onclick = window.location.href='create.php'>Retornar</button>";

                }

                // logando no banco de dados
                $connection = ConnectDataBase();

                if ($connection != null) {

                    $result = $connection->query('INSERT INTO students (Name, BirthDay, Classroom, Register) VALUES ("' . $nome . '", "' . $data . '", "' . $sala . '", "' . $cpf . '");');

                    if ($connection->errno == 0 ) {

                        echo "<p> Dados cadastrados com sucesso!!</p>";

                    } else {

                        echo "<p> Erro no cadastro, entre em contato com o administrador</p>";

                    }


                } else {

                    echo "<p> Erro de conexão com o Banco de Dados!!</p>";

                }



                



            }

        } catch (Exception $e) {

            echo $e->getMessage();

        }

        
    
    
    
    ?>

    

    

    


</body>
</html>