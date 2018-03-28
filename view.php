<?php
require 'kpconn.php';
?>
<?php
session_start();
?>
<!doctype html>
<html>
    <head>
  <style>
  table{
      border:5px solid grey;
      background-color:lightblue;
      border-collapse:collapse;
  }
  th{
   border-bottom:3px solid black;
   padding:15px;
   font-size:40px;
   border-right:1px solid black;
  }
  td{
  font-size:20px;
  text-align:center;
 border:1px solid black;
  }
  </style>
     <title>main</title>
       <link rel="stylesheet" href="keeptrack.css">
       <meta charset="UTF-8">
       <meta name="viewport"  content="width=device-width, initial-scale =1">
    </head>
    <body>
  <header>
      <h1><img src="kpmain.jpg" alt="kpmain"></h1> 
</header>
    <nav>
        <ul>
        <li class="active"><a href="  ">Home</a></li>
        <li>Login</li>
        </ul>
        </nav><br><br><br>
        <?php
         date_default_timezone_set("Africa/Douala");
         ?>
    <?php
    if(isset($_SESSION['ID'])){
     $kpsid = $_SESSION['ID'];
    }
    $select = "SELECT * FROM vands WHERE kpsid = '$kpsid'";
    $data = mysqli_query($con,$select) or die('error');
    echo " <table>";
    echo " <tr>
    <th>Name Of Product</th>
    <th>Number Of Products Sold</th>
    <th>Price Of Product</th>
    <th>Date & Time</th>
    </tr> ";
    while($row = mysqli_fetch_array($data,MYSQLI_ASSOC)){
     echo "<tr><td>";
    echo $row['nop'];
    echo "</td><td>";
    echo $row['nopr'];
    echo "</td><td>";
    echo $row['pop']." "."fcfa";
    echo "</td><td>";
    echo $row['date'];
    echo "</td></tr>";
    }
    echo "</table>";

    ?><br><br><br>
     <br> <a id="final" href="logout.php" onclick="window.confirm('Are you sure you want to leave this site?')">LogOut</script></a><br><br><br>
      <footer>
        KEEP TRACK &#169 copyright <?php echo date("Y"); ?>
        </footer>          
    </body>
</html>