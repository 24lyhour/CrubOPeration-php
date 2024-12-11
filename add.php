
<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "crud_php";


            $connect = new mysqli($host, $username, $password, $db);
            if ($connect->connect_error) {
                die("error connection to db" . $connect->connect_error);
            }


        $name ="";
        $age ="";
        $address ="";
                        // request server to form POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $name = $_POST['name'];
                $age = $_POST['age'];
                $address = $_POST['address'];

                // echo $name;
                    // check    if user not input data is emmtisting is alert
                if($name =="" || $age =="" || $address ==""){
                    echo "
                        <script>
                                alert('All this field not found data!');
                        </script>
                    ";
                }
                        // $sql conneted to Database insert
                $sql = "INSERT INTO users (name , age , address) VALUES ('$name','$age', '$address')";

                    // $result to connect query $sql
                $result = $connect->query($sql);
                    if(!$result){
                        die("Data can't connected");
                            
                    }
                    // check if not error , go to $result to in face.php table
                        header('location: face.php');
                        exit;
            }

                            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user about</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contact">
    
      <form method="POST">
            <div class="center">
                    <h1>Inset data person</h1>
                                


                    <input placeholder="name" name="name" class="int" value="">
                    <input placeholder="age" name="age" class="int" value="">
                    <input placeholder="address" name="address" class="int" value="">
                    <button type="submit" class="btn">Add</button>


                </div>

      </form>

    </div>
</body>
</html>