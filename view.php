<?php
require_once 'dbconnect.php';

$object = new DbConnect();

$rows = $object->fetchData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a{
            text-decoration:none;

        }
        a:link{
            color:#fff;
        }
        table,th,td,td{

            border:1px solid #f68424;
            background-color:#525252;
            color:#fff;
        }
        table{
            width:40%;
            margin:; 
        }
        body{
            background-color: #353535;
        }

        table tr:nth-child(odd){
            background-color:#ff33cc;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <table class="table">
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Delete</th>
        </tr>
        <?php
        if(!empty($rows)){
            foreach($rows as $row){
            ?>
            <tr>
                <td><?php echo $row['ID']?></td>
                <td><?php echo $row['fname']?></td>
                <td><?php echo $row['lname']?></td>
                <td><?php echo $row['email']?></td>
                <td><a href="delete.php?Del=<?php echo $row['ID'] ?>">Delete</a></td>
            </tr>
            <?php
            }
        }
            ?>
    </table>
    
</body>
</html>