<?php 

class ClassSqlUtil extends DatabaseFunctionality{

	private $queries = array();
	private $table;
	private $id_name;
	private $id_value;
	private $where;
	private $fields;
	private $id_type;
	private $class;
	private $error;
	private $limit;

	public function setLimit($_limit){

		$this->limit = $_limit;
	}

	public function getLimit(){

		return $this->limit;
	}

	public function __construct(){
		parent::__construct();
		$this->error = new ErrorFunctionality();
	}

//--------------------------------------------------------------------------------

	public function setFields($_fields){

		if(!empty($_fields)){

			$this->fields = $_fields;

		}
	}

	public function getFields(){

		$_fields = $this->fields;

		if(is_array($this->fields)){
			
			$_fields = '';

			for($i=0; $i < count($this->fields); $i++){ 
				
				if($i > 0){

					$_fields .=', ';
				}

				$_fields .=$this->fields[$i];
			}

		}		
		return $_fields;
	}

//--------------------------------------------------------------------------------

	public function setWhere($_where){
		$this->where = $_where;
	}

	public function getWhere(){
		return $this->where;
	}

//--------------------------------------------------------------------------------

	public function setTable($_table){
		$this->table = $_table;
	}

	public function getTable(){
		return $this->table;
	}

//--------------------------------------------------------------------------------

	public function setIdName($_id_name){
		$this->id_name = $_id_name;
	}

	public function getIdName(){
		return $this->id_name;
	}

//--------------------------------------------------------------------------------

	public function setClass($_class){
		$this->class = $_class;
	}

	public function getClass(){
		return $this->class;
	}

//--------------------------------------------------------------------------------

	public function setIdValue($_id_value){
		$this->id_value = $_id_value;
	}

	public function getIdValue(){
		return $this->id_value;
	}

//--------------------------------------------------------------------------------

	public function setIdType($_id_type){
		$this->id_type = $_id_type;
	}

	public function getIdType(){
		return $this->id_type;
	}

//--------------------------------------------------------------------------------

	public function setQueries($_query){
		$this->queries[] = $_query;
	}

	public function getQueries(){
		return $this->queries;
	}

//--------------------------------------------------------------------------------

	public function selectQuery(){

		if(trim($this->getTable()) !=""){
			$_where = " 1 = 1 ";
			$_fields = "*";


			if( trim($this->getWhere()) != ""){
				$_where .=" and ".$this->getWhere();
			}
			elseif( ( trim($this->getIdName()) != "") ){
				$quote = "'";
				if( trim($this->getIdType()) != ""){
					if($this->getIdType() != "str"){
						$quote = "";
					}
				}

				$idval =$this->getIdValue();
				if( (empty($idval)) && (is_numeric(0)) ){
					$idval = '0';
				}
				if(!empty($idval)){
					$_where .= " and ".$this->getIdName()." = ".$quote.$idval.$quote;
				}
			}

			if( trim($this->getFields()) != ""){
				$_fields = $this->getFields();
			}

			$_limit =$this->getLimit();
			if(!empty($_limit)){

				$_limit = " limit ".$_limit;
			}

			$query = "select ".$_fields." from ".$this->getTable()." where ".$_where.$_limit;

			parent::setQueries($query);
			
			parent::prepareQuery();
			
			return parent::resultset();

		}else{
			$this->error->setMsjError("ERROR:  The table name has no been informed.");
			return false;
		}


	}

	public function count(){

		if(trim($this->getTable()) !=""){

			$_where = "";

			if( trim($this->getWhere()) != ""){
				$_where .=" where ".$this->getWhere();
			}

			$query = "select count(*) total from ".$this->getTable()." ".$_where;

			parent::setQueries($query);

			parent::prepareQuery();

			return parent::resultset();

		}

	}

	public function tableFields(){

		if( trim($this->getTable()) != ""){

			$sql = "desc ".$this->getTable();	
			$query = parent::getConnect()->prepare($sql);
			$query->execute();

			return $query->fetchall();

		}
		else{
			$this->error->setMsjError("ERROR: The table name has no been informed.");
			return false;
		}
	}


	public function foreignKeyTables($foreign){

		$query = "select table_name from  information_schema.KEY_COLUMN_USAGE 
					where column_name = :field and table_schema = :database";
		parent::setQueries($query);
		$query = parent::prepareQuery();
		parent::bind(':database', parent::getDBName());
		parent::bind(':field', $foreign);
		return parent::single();
	}

	public function allPrimaryKeys(){

		$query = "select TABLE_NAME, COLUMN_NAME from  information_schema.KEY_COLUMN_USAGE 
					where  table_schema = :database and constraint_name='PRIMARY'";
		parent::setQueries($query);
		$query = parent::prepareQuery();
		parent::bind(':database', parent::getDBName());
		return parent::resultset();
	}

	public function getTablePrimaryKey(){

		if( trim($this->getTable()) != ""){

			$query = "SHOW KEYS FROM ".$this->getTable()." WHERE Key_name = 'PRIMARY'";

		    $query = parent::getConnect()->prepare($query);
		    $query->execute();

		    $arrayTable = $query->fetchall();
		      
			return $arrayTable[0]['Column_name'];
		}
		else{
			$this->error->setMsjError("ERROR: The table name has no been informed.");
			return false;
		}

	}

    public function getTablePagination($_line="0"){

      $query = "select table_name from information_schema.tables where table_schema = '".parent::getDBName()."'";

      $query = parent::getConnect()->prepare($query);
      $query->execute();

      $arrayTables = $query->fetchall();
      
      return $arrayTables;
    
    }

    public function updateUtil($_table, $_sqlSET, $_arrayBindValue, $_where){
  
      	$where = "";
    	if(!empty($_where)){
	    	$where =" where ". $_where; 

    	}

    	 $query = "update ".$_table." set ".$_sqlSET." ".$where;
		parent::setQueries($query);
		parent::prepareQuery();
	    for($i=0; $i< count($_arrayBindValue); $i++){
			$bindNumber = $i+1;
			parent::bind( $bindNumber, $_arrayBindValue[$i]);

	    }

	    return parent::stmtExecute();

    }

    public function insertUtil($_table,$_fields_prepare,$_value_prepare, $_array_bindValue){

    	$query = "insert into ".$_table." (".$_fields_prepare.") values (".$_value_prepare.")";
		parent::setQueries($query);
		parent::prepareQuery();
	    for($i=0; $i< count($_array_bindValue); $i++){
			$bindNumber = $i+1;
			if(empty($_array_bindValue[$i])){ $_array_bindValue[$i] = '';}
			parent::bind($bindNumber, $_array_bindValue[$i]);
	    }

	    return parent::stmtExecute();

    }

    public function deleteUtil($_table, $_where){

    	$where="";
    	if(!empty($_where)){
    		$where = " where ".$_where;
    	}

    	$query = "delete from ".$_table." ".$where;

		parent::setQueries($query);
		parent::prepareQuery();

	    return parent::stmtExecute();


    }

}

?>
