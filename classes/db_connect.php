<?php 

class DatabaseHandler

{

    var $host, $dbuser, $dbpass, $db, $DBH ,$STH;

    

    function __construct() 

    {

        global $db,$dbuser,$dbpass,$dbhost;

        $this->host = DB_HOST;

        $this->dbuser = DB_USERNAME;

        $this->dbpass = DB_PASSWORD;

        $this->db = DB_NAME;

    }



    function connect() 

    {

        if ($this->DBH != null)

            return;

        try {

            $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->db", $this->dbuser, $this->dbpass);

            $this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            throw $e;

        }

    }

    function query($sql){

        $this->connect();

        if ($this->DBH == null)

            throw new Exception("Database connection error");

        try{

            $STH=$this->DBH->prepare($sql);

            $STH->execute();

            return $STH;

        }catch (Exception $e){

            throw $e;

        }

    }

    function execute($sql,$params){

        $this->connect();

        if ($this->DBH == null) {

            throw new Exception("Database connection error");

        }

        try{

            $STH=$this->DBH->prepare($sql);

            $STH->execute($params);  

            return $STH;

        }catch (Exception $e){

            throw $e;

        }

    }

    

    function raw_handle(){

        $this->connect();

        if ($this->DBH == null) {

            throw new Exception("Database connection error");

        }

        return $this->DBH;

        

    }



    function disconnect() {

        $this->DBH = null;

    }

}



global $conn;





$servername = DB_HOST;

$dbname=DB_NAME;

$username = DB_USERNAME;

$password = DB_PASSWORD;



    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 date_default_timezone_set("Asia/Calcutta");

$date = date("Y-m-d H:i:s");

global $date;



?>

