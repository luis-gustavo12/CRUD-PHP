

<?php 

    session_start();

    echo '<script>window.alert("passou")</script>';

    if (isset($_POST)) {

        require("functions/connection.php");
        require("classes/User.php");

        $connection = ConnectDataBase("password");

        if ($connection != null) {

            // $data[user][pwd]
            $data = array();

            $result = $connection->query("SELECT user, password FROM userdata");

            if ($result) {

                while ($row = $result->fetch_assoc()) {
                    
                    $user = new User($row["user"], $row["password"]);
                    array_push($data, $user);

                }

            }

            $connection->close();

        }

        $user = $_POST["username"];
        $password = $_POST["password"];

        if (empty($user)) {
            header("Location: home.php");
            exit();
        }

        if (empty($password)) {
            header("Location: home.php");
            exit();
        }

        foreach ($data as $loginUsers) {

            if ($user == $loginUsers->getUsername() && $password == $loginUsers->getPassword()) {

                

                $_SESSION["name"] = $loginUsers->getUsername();
                header("Location: ../index.php");
                break;
                

                

            } else {

                //TODO: tratativa de erro ao não logar
                header("Location: home.php");
                break;

            }

        }

        exit();

    }

?>
