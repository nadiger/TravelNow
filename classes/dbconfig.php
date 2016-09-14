<?php
class dbconfig {
/*   // database hostname 
  protected static $host = "ECWBLRD035\MSSQLSERVER2012";
  // database username
  protected static $username = "sa";
  // database password
  protected static $password = "Pwd4db@114";
  //database name
  protected static $dbname = "MyDB";
  static $con;
  $dsn = 'Indexing';
	$user = 'sa';
	$password = 'Pwd4db@114';
 */
 
 $myServer = "ECWBLRD035\MSSQLSERVER2012";
$myUser = "sa";
$myPass = "Pwd4db@114";
$myDB = "examples"; 


  
  
  function __construct() {
    self::$con = new PDO($dsn, $user, $password); 
  }
  
  // open connection
  protected static function connect() {
     try {
		/*  $con = new PDO($dsn, $user, $password);

		if( $con ) {
			 echo "Connection established.<br />";
		}else{
			 echo "Connection could not be established.<br />";
					}
     } catch (Exception $e) {
       echo "Error DB: ".$e->getMessage();
     } */ 
	 
	 
	 //connection to the database
	//$dbhandle = mssql_connect($myServer, $myUser, $myPass)
	or die("Couldn't connect to SQL Server on $myServer"); 
	echo "Connection Established";
	//select a database to work with
	//$selected = mssql_select_db($myDB, $dbhandle)
	or die("Couldn't open database $myDB");  
	 
  }

 // close connection
  public static function close() {
     mssql_close(self::$con);
  }

  public static function run($query) {
    try {
      if(empty($query) && !isset($query)) {
        throw new exception("Query string is not set.");
      }
      $result = mssql_query(self::$con, $query);
      self::close();
     return $result;
    } catch (Exception $e) {
      echo "Error: ".$e->getMessage();
    }
     
  } 

}