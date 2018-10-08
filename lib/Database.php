<?php 

class Database
{
    private static $nameDb = 'mf_bill';
    private static $hostDb = 'localhost';
    private static $userDb = 'root';
    private static $passDb = '';
    public $pdo;
    public function __construct(){
        if(!isset($this->pdo)){
			try{
				$this->pdo = new PDO("mysql:dbname=".self::$nameDb.";host=".self::$hostDb,self::$userDb,self::$passDb);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo "Failed to connect database ". $e->getMessage();
			}
		}
    }
}

?>