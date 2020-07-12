<?php
function connect_to_database()
{
    $servername ="localhost";
    $username = "root";
    $password = "root";
    $databasename = "base-site-routing";
    $name = $_POST ["user_login"];
}
try 
{
    $pdo = new PDO("musql :host=$servername;dbname=$databasename",$username,$password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connecter successfully';
    
    return $pdo;
 }   

catch(PDOException $e) { 
    echo "connection failed : " ;
}
{
    if
{ 
        $sql = query ("SELECT * FROM utilisateurs WHERE Login =$name ")  ; 
        $stmt = $spo -> query($sql);
        $username =$stmt -> fretch();
        var_dump ($username) ;

 }

 else 
 {
 echo "identifiant incorrect / mot de passe incorrect "

}
{
    else
    $erreur = 'Un membre possède déjà ce login.';

     }
     {
		else
		$erreur = 'Un membre possède déjà ce login.';
 
   }

   ?>
   