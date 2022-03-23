<?php
$servername = "localhost";
$dbname = "resto";
$username = "root";
$password = " ";

$civilite = $_POST["civilite"];
$nom = $_POST["nom"];
$Prenom = $_POST["Prenom"];
$mail = $_POST["mail"];
$Telephone = $_POST["Telephone"];
$Adresse = $_POST["Adresse"];
$Evenement = $_POST["Evenement"];
$choix= $_POST["choix"];
$evDate = $_POST["evDate"];
$autrechoix = $_POST["autrechoix"];



try{
$dbco = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                                                   
$sth = $dbco->prepare("INSERT INTO reservationtable( civilite, nom, Prenom, mail, Telephone, Adresse, Evenement, evDate, choix, autrechoix) VALUES(:civilite, :nom, :Prenom, :mail, :Telephone, :Adresse, :Evenement, :evDate, :choix, :autrechoix)");

$sth->bindParam(':civilite',$civilite);
$sth->bindParam(':nom',$nom);
$sth->bindParam(':Prenom',$Prenom);
$sth->bindParam(':mail',$mail);
$sth->bindParam(':Telephone',$Telephone);
$sth->bindParam(':Adresse',$Adresse);
$sth->bindParam(':Evenement',$Evenement);
$sth->bindParam(':evDate',$evDate);
$sth->bindParam(':choix',$choix);
$sth->bindParam(':autrechoix',$autrechoix);
$sth->execute();
header("Location:merci.html");
}

catch(PDOException $e){
	echo "Erreur de traitement:" . $e->getMessage() ;
}


?>