<?php
 
define("HOST","localhost");
define('USER',"root");
define('PASS',"");
define('BASE', "testdb");
 

class ConnexionBase
{	private static $instance;
	private $cnx=null;
	public function __construct()
	{	$dsn="mysql:host=".HOST.";dbname=".BASE;
		try
		{	$this->cnx = new PDO($dsn,USER,PASS);	}
		catch(PDOException $except)
		 {	echo"Echec de la connexion",
                $except–>getMessage();
			exit();	
            }	
           }
	 
 public   function getConnexionBase()
	{	return $this->cnx; }
}
?>
