<?php
require 'kpconn.php';
?>
<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
    $name =  mysql_real_escape_string($_POST['kpsname']);
    $email =  mysql_real_escape_string($_POST['kpsemail']);
    $tel =  mysql_real_escape_string($_POST['kpstel']);
    $password =  mysql_real_escape_string($_POST['kpspassword']);
    $cpassword =  mysql_real_escape_string($_POST['kpscpassword']);
    if($password == $cpassword) {
    $password = md5($password);//hashing the password
    $sql = "INSERT INTO keeptracksignup(kpsname,kpsemail,kpstel,kpspassword) VALUES ('$name','$email','$tel','$password')";
    mysqli_query($con,$sql);
    $_SESSION['message'] = "You are now logged in";
    $_SESSION['name'] = $name;
    header("location: referal.php");//redirecting page
    } else{
    $_SESSION['message']= "The Passwords do not correspond ";
    }
  }
?>
<?php
if(isset($_POST['lsubmit'])){
  $name =  mysql_real_escape_string($_POST['kplname']);
  $password =  mysql_real_escape_string($_POST['kplpassword']);
  $password = md5($password);
  $sql = "SELECT * FROM keeptracksignup WHERE kpsname ='$name' AND kpspassword = '$password'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result) == 1){
      $_SESSION['message'] = "You are now logged in";
      $_SESSION['name'] = $name;
      $row = $result->fetch_array(MYSQLI_BOTH);
      $_SESSION['ID'] = $row['kpsid'];
      header("location:keep_trackmain.php");
   }
   else{
       $_SESSION['message'] = "Name or Password is incorrect";
   }
}

?>
<!doctype html>
<html>
    <head>
<title>KEEP_TRACK</title>
<link rel="stylesheet" href="keeptrack.css">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<meta charset="UTF-8">
<script src="keep_track.js"></script>
    </head>
    <body>
      <h1> <img src="kpmain.jpg" alt="kpmain"></h1>         
     <nav>
     <ul>
     <li>Home</li>
     <li class="active"><a href="">Login</a></li>
     </ul>
     </nav><br><br>
     <div>
     <?php
if(isset($_SESSION['message'])){
echo "<div id= 'wrong'>".$_SESSION['message']."</div>";
unset($_SESSION['message']);

}
?>
  </div><br>
     <form method="post" action="keep_track.php">
     <div class="fix">
       Name:<input type="text" name="kplname" id="kplname" required> 
	   Password:<input type="password" name="kplpassword" id="kplpassword" required>  
	   <button type="submit" class="enter" name="lsubmit">Login</button> <br>
</div>
     </form><br><br>
    <h2 class="smaller"> <p><b>New to keeptrack? Create an account!</b></p></h2><br>
     <form method="post" action="keep_track.php">
         <fieldset class="small">
           <legend><img src="keeptrack.jpg" alt="keeptracksignupform" width="200px" height="80px"></legend>
		   Name:<br>
		   <input type="text" name="kpsname" id="kpsname" required><br>
		  Email:<br>
         <input type="email" name="kpsemail" id="kpsemail"><br>
         Tel:<br>
         <input type="tel" name="kpstel" id="kpstel" required ><br>
         Password:<br>
         <input type="password" name="kpspassword" id="kpspassword" required ><br>
        Confirm Password:<br>
        <input type="password" name="kpscpassword" required><br><br>
        <button  type="submit" class="enter" id="button" name="submit">SignUp</button><br>
        </fieldset>
    </form><br><br><br>
    <footer>
    KEEP TRACK &#169 copyright <?php echo date("Y"); ?>
    </footer> 
      </body>
</html>