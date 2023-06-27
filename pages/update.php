<?php 

session_start();
if ( ! isset($_SESSION["name"] ) ) {
    header("Location: home.php");
}

else {

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="../js/update.js"></script>
    <title>Update</title>
</head>
<body>
    
    <h1>Página de Alteração de Dados</h1>

    <h2>

        <form action="#" method="post">

            <p>
                <label for="idinputBuscaIndexada">Índice</label>
                <select name="inputBuscaIndexada" id="idinputBuscaIndexada">

                    <option value="">--Selecione uma opção--</option>
                    <option value="CPF">CPF</option>
                    <option value="Name">Nome</option>
                    <option value="Classroom">Sala</option>

                    

                </select>

                <label for="idvalorBuscaIndexada"></label>
                <input required type="text" name="valorBuscaIndexada" id="idvalorBuscaIndexada">

            </p>



            <p>
                <button type="submit">Buscar</button>
            </p>




        </form>

        

        <?php 
        
            // TODO: atribuir buscas no HTML para outros valores além do CPF

            require("functions/connection.php");
            require("functions/display.php");

        

            if(isset($_POST)) {

                

                $opcao = $_POST["inputBuscaIndexada"];
                $valor = $_POST["valorBuscaIndexada"];


                if (isset($opcao)){

                    $connection = ConnectDataBase();
                    if ($connection == null) {DisplayErroBD();}

                    else {

                        $query = BuscaPorIndice($opcao, $connection, $valor);

                        if ($query == false || $query->num_rows == 0) {

                            echo "<p>Nenhum registro encontrado!! Verifique se os dados foram fornecidos corretamente, ou então crie um novo registro</p>";
                            
                        }else {

                            DisplayTable($query);


                            $registrosDeBusca = BuscaRegistros($query);
                            echo '

                            <form action ="updateBD.php" method="post" target="updateBD.php">
                                
                                <p id="paragrafoEnvio">
                                    <label for="idTrocaBD"></label>
                                    <select name="valorTrocaBD" id="valorTrocaBD">
                                        <option value="CPF">registro</option>
                                        <option value="nome">Nome</option>
                                        <option value="sala">Sala</option>
                                        <option value="dataNasc">RG</option>
                                    </select>

                                    ';

                                    

                            echo '
                                
                            <label for="idRegistro" id="selectRegistro">Registro</label>
                            ';
                                    
                            echo '<select name="selectRegistros" id="idSelectRegistros">';
                            echo    '<option value="">--Selecione um CPF dos encontrados</option>';

                            for ($i = 0; $i < count($registrosDeBusca); $i++) {

                                echo '<option value="' . $registrosDeBusca[$i] . '">' . $registrosDeBusca[$i] . "</option>";

                            }

                            echo '</select>';


                            echo '
                                    
                                
                                    <label for="idEnvioTroca"></label>
                                    <input type="text" name="envioTroca" id="idEnvioTroca">
                                
                                    <button type="submit">Mudar conteúdo</button>
                                </p>
                                
                                
                            </form>
                                
                                ';

                            
                                


                            }

                        } 


                    }

                    
                }
                

        
        ?>

            


    </h2>
    
</body>
</html>


<?php 

}

?>