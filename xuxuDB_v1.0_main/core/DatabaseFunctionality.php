<?php
/*******************************************************************************************************************************
Obs: Some information to create that class was got from the website: http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/
by the way, thank you.

*******************************************************************************************************************************/
class DatabaseFunctionality extends PDO{

	private $connect;
	private $rowNum;
	private $error;
	private $last_insert_id;
	private $stmt;
	private $queries;
	private $dbname;
	private $connection_name;

	public function setConnectionName($_connection_name){

		$this->connection_name = $_connection_name;
	}

	public function getConnectionName(){

		return $this->connection_name;
	}

	public function __construct($_connect = NULL){

		$this->error = new ErrorFunctionality();

		$this->setConnect($_connect);

	}

	public function setDbName($_dbname){

		$this->dbname = $_dbname;
	}

	public function getDbName(){
		return $this->dbname;
	}

	/*
	 * Creating a conection by PDO
	*/
	private function connect($_CONFIG_DB, $_array_options =array()){

		if(empty($_array_options)){

	        $options = array(
	            PDO::ATTR_EMULATE_PREPARES    => false,
	            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
	        );

	    }

	    if (is_array($_CONFIG_DB)) {

        	$connected = false;

	        try{
	            $this->connect = new PDO("".$_CONFIG_DB["DRIVER"].":host=".$_CONFIG_DB["HOST"].";dbname=".$_CONFIG_DB["DBNAME"]."", $_CONFIG_DB["USER"], $_CONFIG_DB["PASSWORD"], $options);

        		$this->setDbName($_CONFIG_DB["DBNAME"]);
        		$connected = true;

        	}
	        catch(PDOException $e){

	            $this->error->setError($e->getMessage());

	        }

	    }

	    return $connected;

	}

	public function getConnect(){
                  
		return $this->connect;
	}

	/*
	*
	*SetConnect('Connection_name_created_in_db_conection.ini')
	*Function: It set the conection will be used
	*Parameter: Connection name created in db_conection.ini
	*
	*/
	public function setConnect($_connect = NULL){

		$CONFIG_DB = parse_ini_file(XUXU_PATH."configurationXuxuDB/db_conection.ini",true);


			if(!empty($_connect)){

				if(array_key_exists($_connect, $CONFIG_DB)){

					$connected = $this->connect($CONFIG_DB[$_connect]);

					if(!$connected){

						die("XuxuDB Fatal Error: Database configuration not working");
					}

		            $this->setConnectionName($_connect);

				}
				else{
					die("XuxuDB Fatal Error: Database configuration not existe");
				}

			}
			else{

				/*If it was not informated which database configuration will be used so it gets
				the first valid one that is listed in the archive db_conection.ini*/ 
				$CONFIG_KEYS = array_keys($CONFIG_DB);

				$connected = false;
				$count = 0;
				$total = count($CONFIG_KEYS);

				while ($connected == false) {
					
					if($count < $total){

						$connected = $this->connect($CONFIG_DB[$CONFIG_KEYS[$count]]);
						
						if ($connected == true) {

				            $this->setConnectionName($_connect);

						}

						$count++;

					}else{

						die("Fatal Error: There is not a valid database configuration.");
					}

				}

			}

	}

	public function setStmt($_stmt){
		$this->stmt = $_stmt;
	}

	public function getStmt(){
		return $this->stmt;
	}

	public function getQueries(){
		return $this->queries;
	}

	public function setQueries($_queries){
		$this->queries = $_queries;
	}

	public function getRowNum(){
          
		return $this->rowNum;
	}

	public function setRowNum($_rowNum){

		$this->rowNum = $_rowNum;
	}

	public function bind($param, $value, $type = null){
	    if (is_null($type)) {
	        switch (true) {
	            case is_int($value):
	                $type = PDO::PARAM_INT;
	                break;
	            case is_bool($value):
	                $type = PDO::PARAM_BOOL;
	                break;
	            case is_null($value):
	                $type = PDO::PARAM_NULL;
	                break;
	            default:
	                $type = PDO::PARAM_STR;
	        }
	    }

    	if(is_object($this->stmt)){
   		    $this->stmt->bindValue($param, $value, $type);
    	}
    	else{
			$this->error->setError("STMT is not a object");
			echo $this->error->errorFormated();
    	}

	}

	public function resultset(){
	    try{
	    	if($this->stmtExecute()){
		    	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	    	}
	    	else{
	    		return false;
	    	}
        }catch(PDOException $e){
            $this->error->setError($e->getMessage());
        }
	}

	public function single(){
	    $this->stmtExecute();
	    return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}


	public function prepareQuery(){
		try{
	    	$this->stmt = $this->connect->prepare(self::getQueries());
		}
		catch(PDOException $e){
			$this->error->setMsjError($e->getMessage());
			echo $this->error->errorFormated();
		}
	}

	public function getLastInsertId(){
			return $this->connect->lastInsertId();
	}


	public function stmtExecute(){
		try{
			if(is_object($this->stmt)){
	
			    return $this->stmt->execute();
			}
			else{
				$this->error->setError("STMT is not a object");
				echo $this->error->errorFormated();
			}
		}
		catch(PDOException $e){
			$this->error->setError($e->getMessage());
			echo $this->error->errorFormated();
		}
	}

}

?>