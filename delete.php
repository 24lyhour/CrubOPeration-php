<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "crud_php";


                    $connect = new mysqli($host, $username, $password, $db);
                    if ($connect->connect_error) {
                        die("error connection to db" . $connect->connect_error);
                    }

        // isset() = Is question conntect to server ID to paramater or error connected to id  server
            if(isset($_GET['id'])){

                $id = $_GET['id'];

                // it if to  database , go to 
                    $sql ="DELETE FROM users WHERE id=$id";
                        // execute to database
                    $connect->query($sql);

                   
            }
            header('location: face.php');
            exit;

?>