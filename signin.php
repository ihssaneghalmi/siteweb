<!doctype html>
<html>
<head>
    <title>Inscription</title>
</head>

<body>
    <h2><u>Sign-in</u></h2><br>
    <form id="formulaire_test" action="" method="post" autocomplete="off">
 
 <table>
 <tr><td>
  <label for="username"> Nom or Email :</label></td>
<td> <input type="text" size="30" name="name" id="name"> </td></tr> 
<tr><td>
  <label for="password">password :</label></td>
<td> <input type="password" size="30" name="pass" id="pass"> </td></tr> 

</table>
 <button type="submit" value="ok" >Sign-in</button>
    </form>
	<a href="signup.php">sign_up</a>
</body>
<?php
require 'config.php';
if(isset($_Post["submit"])){
    $name=$_Post["name"];
    $eml=$_POST["eml"];
    $result=mysqli_query($conn,"select * from utilisateur where Nom ='$name' or Email='$eml'");
	$row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows( $result)> 0){
		if($pass==$row["password"]){
			$_SESSION["signin"] = true;
			header("location:index.php");}
			else{
        echo
        "<scripts> alert('wrong password');</scripts>";}
			}
        else{
        
               echo
               "<scripts> alert('user not signup');</scripts>";}
                          
                         
                        }
?>

</html>