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



?>