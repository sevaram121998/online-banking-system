<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        table, th, td{
    border-collapse: collapse;
    color: #495464;
    font-family: monospace;
    font-size: 25px;
    text-align: left;
    border: 1px solid #495464;
    margin-left: auto;
    margin-right: auto;
}

td, th{
    padding: 10px;
}
    </style>

</head>
<body style="margin: 10px 50px 10px 50px;">
<?php include 'header.php'?>
    <h1>LIST OF CUSTOMERS</h1>
    <div style="overflow-x:auto; padding: 30px 0 30px 0">
    <table>
        <tr>
            <th>CUSTOMER_ID</th>
            <th>CUSTOMER_NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>CURRENT_BALANCE</th>
        </tr>

        <?php 
            $conn = mysqli_connect("localhost", "root", "root", "transactions", "3306");
            if($conn-> connect_error){
                die("Connection failed:". $conn-> connect_error);
            }

            $sql = "SELECT * FROM customers";
            $result = $conn-> query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr>
                    <td>".$row["CUSTOMER_ID"].
                    "</td><td>".$row["CUSTOMER_NAME"].
                    "</td><td>".$row["EMAIL"].
                    "</td><td>".$row["MOBILE"].
                    "</td><td>".$row["CURRENT_BALANCE"].
                    "</td>
                    <td><a class='btn btn-primary btn-lg'  href='send.php?CUSTOMER_ID=".$row['CUSTOMER_ID']."'>View</a></td>
                    </tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 result";
            }

            $conn-> close();
        ?>

    </table>
    </div>
    
</body>
</html>