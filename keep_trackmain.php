<?php
require  'kpconn.php';
?>
<?php
session_start();
?>
<?php
if(isset($_GET['save'])){
    $nop = mysql_real_escape_string($_GET['nop']);
    $nopr = mysql_real_escape_string($_GET['nopr']);
    $pop = mysql_real_escape_string($_GET['pop']);
    $kpsid = $_SESSION['ID'];
  $sql = "INSERT INTO vands (nop,nopr,pop,date,kpsid) VALUES ('$nop','$nopr','$pop',CURRENT_TIMESTAMP,'$kpsid')";
 $result = mysqli_query($con,$sql);
  $_SESSION['display'] = "You have Succesfully Saved Some Records!";
  header("location: keep_trackmain.php");
}
?>
<?php
if(isset($_GET['view'])){

    header("location: view.php");
}
?>

<!doctype html>
<html>
    <head>
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
        <b class="best"> WELCOME <?php echo $_SESSION['name'] ;?>! </b>
        <li class="active"><a href="">Home</a></li>
        <li>Login</li>
        </ul>
        </nav><br><br><br>
 <form  method="get" action="keep_trackmain.php"><b><button id="best"  type="submit" name="view" >View List</button></b></form><br>
	  <form class="thin"  method="get" action"keep_trackmain.php">
    <label>Name Of Product:</label><br>
      <input type="text"  name="nop" placeholder="Enter The Name Of Product" required><br><br><br>
      <label>Number Of Products:</label><br>
      <input type="number" name="nopr" placeholder="Enter The Number Of Products Sold" required><br><br><br>
      <label>Price Of Product(s): </label><br>
      <input type="number" name="pop" placeholder="Enter The Price of Product" required><br><br>
      <button id="better" type="submit" name="save" >Save Record</button> 
      </form>
      <div>
     <?php
if(isset($_SESSION['display'])){
    echo "<div id ='wrong'>".$_SESSION['display']."</div>";
    unset($_SESSION['display']);
    }
?>
  </div><br>
      <br> <a id="final" href="logout.php" onclick="window.confirm('Are you sure you want to leave this site?')">LogOut</script></a><br><br><br>
      <footer>
        KEEP TRACK &#169 copyright <?php echo date("Y"); ?>
        </footer>          
    </body>
</html>