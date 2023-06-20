<?php 
    
    function ValidaNome($str) {

        for ($i = 0; $i < strlen($str); $i++) {

            if ( is_numeric( $str[$i] ) ) {

                return false;

            } 

            

        }

        return true;

    
    }


    function ValidaData ($data) {

        $pattern = "/[0-9]{4}[-]?[0-9]{2}[-]?[0-9]{2}/";



        return preg_match($pattern, $data);
    }

    
    function ValidaSala($sala) {

        // Padrao [Ano][Turno][Sala]
        // Ano -> [1- 9]
        // Turno -> [M, T, N]
        // Sala -> [A - K]

        $pattern = "/[1-9]{1}[M|T|N]{1}[A-K]{1}/";

        return preg_match($pattern, $sala);


    }



    function ValidaCPF($cpf) {


        $pattern = "/[0-9]{11}/";

        $teste = preg_match($pattern, $cpf);    

        return preg_match($pattern, $cpf);
    }


    function ConnectDataBase() {

        try {

        

            $connection = new mysqli("localhost", "phplogger", "keftra12", "student_register");

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

    function DisplayErroBD() {

        echo "<p>Erro de conexão com o Banco de Dados!!<br>Contate o Administrador</p>";

    }

    /**
    Função que exibe as informações em tabelas, dado um objeto mysqli, que é resultado do método ->query()
     */
    function DisplayTable($result) {
        echo "<table>";

        echo "<thead>";
        echo "<tr>";
        echo "<th>ID Estudante</th>";
        echo "<th>Nome</th>";
        echo "<th>Data de Nascimento</th>";
        echo "<th>Sala</th>";
        echo "<th>CPF</th>";
        echo "</tr>";

        echo "</thead>";

        
        echo "<tbody>";

        foreach ($result as $row) {

            echo "<tr>";

            echo "<td>" . $row["StudentID"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["BirthDay"] . "</td>";
            echo "<td>" . $row["Classroom"] . "</td>";
            echo "<td>" . $row["CPF"] . "</td>";

            echo "</tr>";

        }

        echo "</tbody>";


        echo "</table>";

    }

    // Funcao que da o display da tabela a qual enviara os dados de mudannça para o servidor
    function DisplaySelectMudanca() {



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