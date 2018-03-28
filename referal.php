
<?php
session_start();
?>
<?php
if(isset($_POST['lsubmit'])){
  $name =  mysql_real_escape_string($_POST['kplname']);
  $password =  mysql_real_escape_string($_POST['kplpassword']);
  $password = md5($password);
  $sql = "SELECT kpsname,kpspassword FROM keeptracksignup WHERE kpsname ='$name' AND kpspassword = '$password'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result) == 1){
      $_SESSION['message'] = "You are now logged in";
      $_SESSION['name'] = $name;
      header("location:keep_trackmain.php");
   }
   else{
       $_SESSION['message'] = "Name or Password is incorect";
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
     <li><a href="">Home</a></li>
     <li class="active"><a href="">Login</a></li>
     </ul>
     </nav><br><br><br>


        <?php
if(isset($_SESSION['message'])){
echo "<div id = 'wrong'>".$_SESSION['message']."</div>";
unset($_SESSION['message']);

}
?><br><br>
     <section>
    <b id="bold"> You Have Succesfully Created an Account You Can Now Login!<br><br> </b>
     <form method="post" action="keep_trackmain.php">
     <div class="fix">
       Name:<input type="text" name="kplname" id="kplname" required> 
	   Password:<input type="password" name="kplpassword" id="kplpassword" required>  
	   <button type="submit" class="enter">Login</button> <br>
</div>
     </form><br><br>
     </section>
     </form><br><br><br>
    <footer>
    KEEP TRACK &#169 copyright <?php echo date("Y"); ?>
    </footer>
    <style>
    #bold{
        font-size:60px;
        color:lightblue;
    }
    
    </style>
     </body>
     </html>