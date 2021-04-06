<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
        h2,h3{
            text-align: center;
            color: #495464;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 50px; 
            font-size: 2vw;
        }

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

<body>
    <?php 
    include 'header.php';
        session_start();

        $conn = mysqli_connect("localhost", "root", "root", "transactions", "3306");
        
        $id = $_GET['CUSTOMER_ID'];

        $sql1 = "SELECT * FROM customers where CUSTOMER_ID = $id"; 
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            
            while($row1 = mysqli_fetch_assoc($result1)) {
                echo "<h2><b>";
                echo "Your Account Details:<br>";
                echo "</h2></b>";
                echo "<h3>";
                echo "CUSTOMER_ID : {$row1['CUSTOMER_ID']} <br>".
                "CUSTOMER_NAME : {$row1['CUSTOMER_NAME']} <br>".
                "EMAIL : {$row1['EMAIL']} <br>". 
                "MOBILE : {$row1['MOBILE']} <br>".
                "CURRENT_BALANCE : {$row1['CURRENT_BALANCE']} <br>"; 
                echo "</h3>";
                
            }
          } else {
            echo "0 results";
          }

          $sql2 = "SELECT * FROM customers where CUSTOMER_ID != $id";
          $result2 = mysqli_query($conn, $sql2);

          echo "<table>
                <tr>
                    <th>CUSTOMER_ID</th>
                    <th>CUSTOMER_NAME</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                    <th>CURRENT_BALANCE</th>
                </tr>";

          if(mysqli_num_rows($result2) > 0){

            while($row2 = mysqli_fetch_assoc($result2)){
                echo "<tr>
                    <td>".$row2["CUSTOMER_ID"].
                    "</td><td>".$row2["CUSTOMER_NAME"].
                    "</td><td>".$row2["EMAIL"].
                    "</td><td>".$row2["MOBILE"].
                    "</td><td>".$row2["CURRENT_BALANCE"];
                    ?>

                    </td><td><a href="transfer.php?CUSTOMER_ID2=<?php echo $row2['CUSTOMER_ID'];?>&CUSTOMER_ID1=<?php echo $id;?>"><button type="submit" class="btn btn-info btn-lg">Transfer</button></a>

                    </td></tr>

            <?php }
                echo "</table>";
            }


          
          mysqli_close($conn);

            
?>

</body>
</html>