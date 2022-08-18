<?php 

require_once("../SharedFiles/connect.php");

$sql_deleteClient = 
	"DELETE FROM Crimson_Client WHERE
		`clientUsername` = '" . $_POST['username']"'";

if($conn->query($sql_deleteClient) === TRUE){
	echo("<br> Client data record deleted successfully");
} else {
	echo("<br> Error deleting Client data: ".$conn->error);
}

 ?>