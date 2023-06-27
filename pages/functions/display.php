<?php   





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





?>