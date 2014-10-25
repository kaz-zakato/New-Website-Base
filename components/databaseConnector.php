<?php
/**
This function open a database connexion and return the database object($SB_DB)
*/
function databaseOpen($host, $user, $password, $dbname){
    $SB_DB = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
    return $SB_DB;
}

/**
  This function close a database connexion
  $SB_DB : The database connection object
*/
function databaseClose($SB_DB){
  mysqli_close($SB_DB);
}

?>

