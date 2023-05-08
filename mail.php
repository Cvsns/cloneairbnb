<?php 
$name = $_POST ['name'];
$mail = $_POST ['mail'];
$message = $_POST ['message'];

$conn = new mysqli('localhost','@root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO `ca`(`ID`, `name`, `mail`, `message`) VALUES (?,?,?)");
		//prépare la connexion
		$stmt->bind_param("sss", $name, $mail, $message);

		//les 3 S correspond a $name $mail $message  S comme String chaine de caracteres

		$execval = $stmt->execute();
		//lexecution de bind param
		$stmt->close();
		$conn->close();
	}
?>
