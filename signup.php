
<html>
<head>
    <title>Inscription</title>
</head>

<body>
    <h2><u>Sign-up</u></h2><br>
    <form id="formulaire_test" action="" method="post" autocomplete="off">
 <table>
 <tr><td>
  <label for="text"> Nom:</label></td>
<td> <input type="text" size="30" name="name" id="name"> </td></tr> 
 
<tr><td>
  <label for="eml"> Email :</label></td>
<td> <input type="text" size="30" name="eml" id="eml"> </td></tr> 

<tr><td>
  <label for="password">password :</label></td>
<td> <input type="text" size="30" name="pass" id="pass"> </td></tr> 
<tr><td>
  <label for="confirmpassword"> confirm password :</label></td>
<td> <input type="text" size="30" name="pass" id="passconfirm"> </td></tr> 
</table>
 <button type="submit"  >Sign-up</button>
    </form>
    <a href="signin.php">Sign-up</a>
    <?php
    require "config.php";
if(isset($_POST['name']) and isset($_POST['eml']) and isset($_POST['pass']))
{
  if(!empty($_POST['name']) and !empty($_POST['eml']) and !empty($_POST['pass']))
  {
    try
    {
      global $bdd;
      $bdd = new PDO('mysql:host=localhost;dbname=inscription;charset=utf8', 'root', '');
      
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
  $sql1="select * from utilisateur where email='".$_POST['eml']."'";
  $reponse = $bdd->query($sql1);
    $donnees = $reponse->fetch();

    if(empty($donnees))
    {   
      $sql2="insert into utilisateur(Nom, email, password) values('".$_POST['name']."','".$_POST['eml']."','".$_POST['pass']."')";
      $bdd->exec($sql2);
      echo"<center>Utilisateur ".$_POST['name']." est ajouté avec succés</center>";
    }
    else
    echo "<center>Utilisateur existe déja !!!</center>";}
  }

?>
</body>
</html>
   