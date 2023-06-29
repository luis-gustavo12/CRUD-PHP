<?php 

    function ConnectDataBase($param = "normal") {

        try {

            require_once("../vendor/autoload.php");


            $dotenv = Dotenv\Dotenv::createImmutable($_SERVER["DOCUMENT_ROOT"]);
            $dotenv->load();

            switch ($param) {

                case "normal":
                    $connection = new mysqli($_ENV["HOSTNAME"], $_ENV["USER"], $_ENV["PASSWORD"], $_ENV["DB_NAME"]);
                    break;

                case "password":
                    $connection = new mysqli($_ENV["HOSTNAME"], $_ENV["USER"], $_ENV["PASSWORD"], $_ENV["DB_PASSWORD"]);
                    break;

                default:
                    break;


            }

            

            if (!!mysqli_connect_errno()) {
                    
                echo '<p class="queryphp">Erro de conexão com o BD!!</p>';
                return null;

            } else {

                return $connection;

            }


        } catch (Exception $e) {

            echo '<p class="queryphp">Erro de conexão com o BD!!</p>';
            return null;
        }
    }



    /**
    Busca valores numa coluna para colocá-los no select do update.php

    */
    function BuscaRegistros ($query) {

        $registros = array();

        foreach($query as $row ) {

            array_push($registros, $row["CPF"]);


        }

        return $registros;

    }

    function BuscaPorIndice(string $indice, mysqli $mysqliObject, $cpf) {

        $queryString = sprintf("SELECT * FROM students WHERE %s = '%s';", $indice, $cpf);

        return $mysqliObject->query($queryString);

    }


?>
