<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "crud_php";


                    $connect = new mysqli($host, $username, $password, $db);
                    if ($connect->connect_error) {
                        die("error connection to db" . $connect->connect_error);
                    }

?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>About of staff</title>
                <link rel="stylesheet" href="style.css">
                <!-- <style></style>
                    .tr1{
                        background-color: blue;
                        color: #dddddd;
                    }
                    .container{
                        width: 1000px;
                        margin: 0 auto;
                        
                    } 
                    .container button{
                        cursor: pointer;

                    }
                    .add{
                        background-color: green;
                        color: #dddddd;
                        padding: 10px 15px;
                        margin-bottom: 10px;
                        border-radius: 2px;
                        border: none;

                    }
                    .delete{
                            background-color: red;
                            color: #dddddd;
                            padding: 10px 15px;
                            border-radius: 2px;
                            border: none;

                    }
                    .delete:hover{
                        background-color:maroon ;
                        color: #dddddd;
                        transform: scale(0.99) ;
                        transition: ease-in-out ;
                        font-weight: bold;
                    }
                    .edit{
                        background-color: green;
                        color: #dddddd;
                        border-radius: 2px;
                        padding: 10px 15px;
                        border: none;

                    }
                    .edit:hover{
                            background-color: aquamarine;
                            color: black;
                            transform: scale(0.99) ;
                        transition: ease-in-out ;
                        font-weight: bold;

                    }
                    .add:hover{
                        background-color: blue ;
                        color: #dddddd;
                        transform: scale(0.99) ;
                        transition: ease-in-out ;
                        font-weight: bold;
                    }
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    tr:nth-child(even) {
                        background-color: #dddddd;
                    }
                </style> -->
            </head>

            <body>



                <div class="container">
                    <h2>Crub operation</h2>

                    <button class="add"><a href="add.php">Add</a></button>
                    <table>
                        <tr class="tr1">
                            <th>Name</th>
                            <th>Age</th>
                            <th>Country</th>
                            <th>Update</th>
                        </tr>

                        <?php
                            // $sql call all form to mysql database
                        $sql = "SELECT * FROM users";
                        $result = $connect->query($sql);
                                // check it if error is to die
                        if (!$result) {
                            die("error connected");
                        }
                            // if not error is show $result in <tb></tb>
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                
                            <tr>
                                <td>$row[name]</td>
                                <td>$row[age]</td>
                                <td>$row[address]</td>
                                <td>
                                    <Button class='edit'> <a href='./edit.php? id=$row[id]'>Edit</a></Button>
                                    <Button class='delete'> <a href='./delete.php? id=$row[id]'>Delete</a></Button>
                                </td>
                            </tr>

                        ";
                        }

                        ?>



                        <!-- <tr>
                                <td>Kouch ly hour</td>
                                <td>21</td>
                                <td>pp</td>
                                <td>
                                    <Button class="edit">Edit</Button>
                                    <Button class="delete">Delete</Button>
                                </td>
                            </tr> -->

                    </table>

                </div>
            </body>

            </html>