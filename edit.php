
<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "crud_php";


            $connect = new mysqli($host, $username, $password, $db);
            if ($connect->connect_error) {
                die("error connection to db" . $connect->connect_error);
            }


        $name ="";    //ka tang jea goloble
        $age ="";
        $address ="";
        $id ="";
                        //check  request server to form POST
            if($_SERVER['REQUEST_METHOD'] == 'GET'){

                if(!isset($_GET['id'])){
                    header('location:face.php');
                    exit;
                }
                    $id = $_GET['id']; // set id go to smer id bos mk
                




                // $name = $_POST['name'];
                // $age = $_POST['age'];
                // $address = $_POST['address'];


                // echo $name;
                    // check    if user not input data is emmtisting is alert

                //  if($name =="" || $age =="" || $address ==""){
                //      echo "
                //          <script>
                //                 alert('All this field not found data!');
                //          </script>
                //     ";
                //  }



                        // it's select id by of which one choose of row What you want to edit
                $sql = "SELECT * FROM users WHERE id = $id";
                 //bdol domlai oy row what want you change
                   
                $result = $connect->query($sql); // $result to connect query $sql database
                $row = $result->fetch_assoc();  //completed of row been you change
                    if(!$row){        // check it if not data is 
                        header('location:face.php');
                        
                        echo"
                            <script>
                                    alert('Update is error');
                            </script>
                        ";
                        // header('location:face.php');
                       }
                        // call it goto skall $row
                       $name = $row['name'];
                       $age = $row['age'];
                       $address = $row['address'];

                    }else{

                        //request progaty name from form POST
                        $name = $_POST['name'];
                        $age = $_POST['age'];
                        $address = $_POST['address'];
                        $id = $_POST['id'];

                        if($name =="" || $age =="" || $address ==""){
                            echo "
                                <script>
                                        alert('All this field not found data!');
                                </script>
                            ";
                            die();
                        }
                        $sql = "UPDATE users SET name ='$name', age ='$age', address ='$address' WHERE id =$id";
                        $result = $connect->query($sql);
                            if(!$result){
                                echo "
                                    <script>
                                        alert('Update is error');
                                    </script>
                                ";
                                die();

                            }
                            header('location:face.php');
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
                    <h1>Update to data</h1>
                                

                    <input type="hidden" name="id" class="int" value="<?php echo $id;?>">
                    <input placeholder="name" name="name" class="int" value="<?php echo $name;?>">
                    <input placeholder="age" name="age" class="int" value="<?php echo $age;?>">
                    <input placeholder="address" name="address" class="int" value="<?php echo $address;?>">
                    <button type="submit" class="btn">Edit</button>


                </div>

      </form>

    </div>
</body>
</html>