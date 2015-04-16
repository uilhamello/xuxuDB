<?php

class ClassTO extends ClassSqlUtil{

	private $table;
	private $id;
	private $IdName;
	private $childClass;
	private $childClassParameters;
	private $atributeDatasArray;
	private $where;
	private $xuxuDB_error;
	private $queries = array();
	protected $selected_fields;
	protected $count;
	protected $total_page;
	protected $status;

	public function __construct(){
	
		parent::__construct();

		$this->xuxuDB_error  = new ErrorFunctionality();
	
	}

	public function getStatus(){

		return $this->status;
	}

	public function setStatus($_status){

		$this->status = $_status;
	}

	public function getError(){

		return $this->xuxuDB_error->getError();
	}

	public function setError($_error){

		$this->xuxuDB_error->setError($_error);
	}

	public function setAtributeDatasArray($_atributeDatasArray){

		if(is_array($_atributeDatasArray) ){

			$this->atributeDatasArray = $_atributeDatasArray;
		}
		else{

			$this->xuxuDB_error->setError("ERROR: The parameter needs to be a array type variable");
		}
	}

	public function getAtributeDatasArray(){

		return $this->atributeDatasArray;
	}

	public function setWhere($_where){

		 $this->where = $_where;

		 $this->getChildClass()->status ='QUERY';
	}

	public function getWhere(){
		
		return $this->where;
	}

	public function getChildClass(){

		return $this->childClass;	
	}
	

	public function setChildClass($classe){

		$this->childClass = $classe;
	}

	public function getId(){

		if( (!empty($this->id)) || ( $this->id === 0) ){
		
			return $this->id;
		}
		else{
			
			$this->id = $this->getChildClass()->{$this->getPrimaryKeyNameTO()};
			
			if( (is_array($this->id)) && (!empty($this->id)) ){

				if(isset($this->id[count($this->id) -1])){

					$this->id = $this->id[count($this->id) -1];
				}
			}
		    
		    return $this->id;	
		}
	}
	
	public function getIdName(){

		$this->setIdName();

	    return $this->IdName;	
	}

	public function getTable(){

		$this->setTable();

	    return $this->table;
	}
	
	public function setTable($_table=""){

		if(trim($_table) !=""){

			$this->table = $_table;
		}
		elseif(trim($this->table) == ""){

			$this->table = strtolower(get_class($this->getChildClass()));
		}

	}
	
	public function setId($_id){

	   $this->id = $_id;	
	}
	
	public function setIdName($_id_name=""){

		if(empty($_id_name)){

			if(trim($this->IdName) == ""){

				$this->IdName = $this->getPrimaryKeyNameTO();
			}

		}
		else{

				$this->IdName = $_id_name;
			}

	}

	public function setChildClassParameters($_parameters){

		$this->childClassParameters = $_parameters;

	}

	public function getClassParameters(){

		if(is_array($this->childClassParameters)){

			if(!empty($this->childClassParameters)){

				return $this->childClassParameters;
			}

		}

		$arrayAtrutos = array();

		$reflect = new ReflectionObject($this->getChildClass());

			foreach ($reflect->getProperties(ReflectionProperty::IS_PUBLIC + ReflectionProperty::IS_PROTECTED + ReflectionProperty::IS_PRIVATE) as $prop) {

					array_push($arrayAtrutos, $prop->getName());
			}		

		$this->setChildClassParameters($arrayAtrutos);

		return $arrayAtrutos;
	}

	public function showQueries(){

		return $this->queries;
	}

	public function setQueries($_queries){

		$this->queries[] = $_queries;
	}
	
	public function populateTO(){
			
		$atributeArray = array();

		$atributeArray = $this->getClassParameters();

		$arrayAll = array();

		parent::setIdName($this->getIdName());

		parent::setIdValue($this->getId());

		parent::setWhere($this->getWhere());
		
		//executa la consulta y guarda el retorno
		$arrayTable  = parent::selectQuery();

		if(count($arrayTable) == 0){
			return false;
		}
		else{

			//Obtene las colunas de la table
			$tableColumns = parent::tableFields($this->getTable());
			$x =0;		
			//Looping in all database datas returned
			while(count($arrayTable) > $x){
				//transforms the corrent array keys in case_lower
				$arrayTableNow = array_change_key_case($arrayTable[$x], CASE_LOWER);
				//looping all table column
				for($i=0; $i < count($tableColumns); $i++){
					//current column
					$field = strtolower($tableColumns[$i]["Field"]);
					//if exists in arrayTableNow the current column in the looping
					if(isset($arrayTableNow[$field])){
						//if the current column is a atribute class
						if(in_array($tableColumns[$i]["Field"],$atributeArray)){
							//passing de value to the espefic class atributte
							$this->getChildClass()->{$tableColumns[$i]["Field"]} = $arrayTableNow[$field];

						}

					}
				}
				$x++;
			}
			$this->count = $x;
			return true;
		}
	}

	public function populateTOByWeb(){

		//Datas from WEB
		$arrayDatas = $this->getAtributeDatasArray();

		if(!empty($arrayDatas)){

			if(is_array($arrayDatas)){

				$atributeArray = $this->getClassParameters();

				$atributeArray = $this->take_out_special_class_parameter($atributeArray);

				//REPLACE THE CLASS PARAMETER VALUE TO THE WEB PASED VALUE
				foreach($atributeArray as $key => $value){

					if(array_key_exists($value, $arrayDatas))
					{

						$this->getChildClass()->$value = $arrayDatas[$value];
					}else{

						$this->getChildClass()->$value = $this->getChildClass()->$value;
					}
				}
			}
			else{

				$this->setError("ERROR: The parameter is not a array type variable");

				return false;
			}
		}

		return false;
	}

	public function getClassTOInfo(){

		$className = get_class($this->getChildClass());

		$classNameInfo = $className."_info";

		return new $classNameInfo();
	}

	public function getPrimaryKeyNameTO(){

		return $this->getChildClass()->primary_key;
	}

	public function updateInsert(){

		$primary_key_value = $this->getId();

		$where = $this->getWhere();

		//IF THERE IS NOT PRIMARY_KEY VALUE AND EVEN ANY WHERE SQL CLAUSO, SO MAKING A INSERT
		if( ((empty($primary_key_value)) && (empty($where))) 
			|| ($this->getChildClass()->status == 'INSERT') ){

			//TRYING INSERT

			$this->getChildClass()->status = 'TRYING INSERT';

			if($this->insert()){

				$this->getChildClass()->status = 'INSERTED';
			}
			else{

				$this->getChildClass()->status = 'FAIL_INSERT';
			}
		}else{
			//TRYING UPDATE
			$this->getChildClass()->status = 'TRYING UPDATE';

			if($this->upDate()){

				$this->getChildClass()->status = 'UPDATED';
			}
			else{

				$this->getChildClass()->status = 'FAIL_UPDATE';
			}
		}

	}

	public function insert(){

		$class = $this->getChildClass();

		$fields = $this->getClassParameters();

		$insert_field="";

		$_valuePrepare="";

		$_arrayBindValue=array();

		$fields = $this->take_out_special_class_parameter($fields);

    	for( $i=0; $i < count($fields); $i++) {

    		$arrayValue = $class->$fields[$i];

    		if(is_array($arrayValue)){

    			if(!empty($arrayValue)){

	    			$value = $arrayValue[0];
    			}else{

    				$value ="NULL";
    			}
    		}else{

    			$value = $arrayValue;
    		}

    		$insert_field .=" ".$fields[$i];

    		$_valuePrepare .="?";

    		$arraySetValue[] = $value;

    		//check if it will have another clause to insert a coma
    		if(($i + 1) < (count($fields))){

    			$insert_field .=",";
    			$_valuePrepare .=",";
    		}
    	}

		return parent::insertUtil($this->getTable(),$insert_field, $_valuePrepare, $arraySetValue);
	}

	public function update(){

		$this->populateTOByWeb();

    	$sqlSet = "";

		$class = $this->getChildClass();

		$fields = $this->getClassParameters();

		$arraysqlSetValue = array();

		$fields = $this->take_out_special_class_parameter($fields);

		$web_datas = $this->getAtributeDatasArray();

		$got_value= 0;

    	for( $i=0; $i < count($fields); $i++) {

    		//IF THE FIELD IS ONE OF PASED FROM ARRAY TO CHANGE
			if(array_key_exists($fields[$i],$web_datas) )
			{

	    		$value ="";

	    		$arrayValue = $class->$fields[$i];

	    		if(is_array($arrayValue)){

	    			if(!empty($arrayValue)){

	    				if(isset($arrayValue[count($arrayValue) - 1])){

			    			$value = $arrayValue[count($arrayValue) - 1];
	    				}
	    			}
	    		}else{

	    			 $value = $arrayValue;
	    		}

	    		if( !empty($value) ){

	    			$got_value = 1+ $got_value;

		    		$sqlSet .=" ".$fields[$i]." = ?";

		    		$arraySetValue[] = $value;

		    		//check if it will have another clause to insert a coma
	    			$sqlSet .=",";
	    		}

			}    		

    	}	

		$sqlSet = trim($sqlSet);
		if(substr($sqlSet,-1,1 ) == ','){
			$sqlSet = substr($sqlSet,0, (strlen($sqlSet) -1));
		}

    	$allWhere =  " 1=1 ";

    	$where = $this->getWhere();
    	if(!empty($where)){

    		$allWhere .=" and ".$where;
    	}
    	else{

	    	$id = $this->getId();
	    	$idName = $this->getIdName();
	    	if( 
	    		( (is_numeric($id)) || (!empty($id)) ) 
	    		&& (!empty($idName)) ){
	    		 $allWhere .= " and ".$idName." = ".$id;

	    	}

    	}
    	return parent::updateUtil($this->getTable(), $sqlSet, $arraySetValue, $allWhere);
	}

	public function delete(){

    	$allWhere =  " 1=1 ";

    	$where = $this->getWhere();
    	if(!empty($where)){

    		$allWhere .=" and ".$where;
    	}else{

	    	$id = $this->getId();
	    	$idName = $this->getIdName();
	    	if( 
	    		( (is_numeric($id)) || (!empty($id)) ) 
	    		&& (!empty($idName)) ){
	    		 $allWhere .= " and ".$idName." = ".$id;

	    	}

    	}

		return parent::deleteUtil($this->getTable(), $allWhere);

	}

	/*
	FUNCTION: __CONTRUCT
	PARAMETER IS NOT OBRIGATORY : IF NOTHING WAS PASED THE CLASS WILL NOT BE POPULATE
	POSSIBLE PARAMETER:
		1) - NULL: THE CLASS WILL NOT BE POPULATE
		2) - 'ALL' OU 'TODO' OU 'TUDO': IF THERE IS ANY OF THESE WORDS THE CLASS WILL BE POPULATE WITH ALL DATABASE REGISTRED (I JUST NO HOW TO SAY 'ALL' IN THIS THREE IDIOMS, YOU CAN ADD YOUR OWN 'ALL' ;) )
		3) - A ARRAY KEY=>VALUE WHICH THE KEY IS THE TABLE FIELD NAME OR A TRANSICTION INFORMATION VALUE, 
			AND VALUE THE VALUE WILL BE USED TO TRANSACTION.
		4) - A JSON STRUCTURE AS KEY=> WHICH THE KEY IS THE TABLE FIELD NAME 
			OR A TRANSICTION INFORMATION VALUE
		POSSIBLE TRANSICTION INFORMATION PARAMETER VALUE:
				EX: $_parameter['ID_XX'] = 1;
			WHERE_XX: CLAUSE TO USE IN A SELECT OR UPDATE INFORMATION
				EX: $_parameter['WHERE_XX'] = 'name like %some_name% ';
			NO_PUPULATE_XX: IF ITS VALUE IS 'TRUE' (BOOLEAN TYPE), GETTING A CLASS WITHOUT VALUES
				EX: $_parameter['NO_POPULATE_XX'] = TRUE;
			UPDATE_XX: INFORMES THAT IT WILL BE USE THE OTHER ARRAY VALUES TO MAKE A UPDATE
	RETURN: Xuxu_persistence_class.
	*/
	public function select($_parameter, $_fields = array()){

		if(!empty($_fields)){

			parent::setFields($_fields);

			$this->selected_fields = $_fields;

		}

		//IF IS A NUMERIC VALUE THEN GETS THE VALUE AS A CLASS PRIMARY_KEY
		if(is_numeric($_parameter)){
			$this->setId($_parameter);
			$populated = $this->populateTO();
			if($populated){
				$this->status ='FILTERED_BY_ONE_ID';
			}else{
				$this->status ='EMPTY_FOR_INVALID_ID';
			}

		}
		elseif(empty($_parameter)){
			return true;
		}//IF THE PARAMETER IS 'ALL' OR YOUR VERSION IN PORTUGUÊS OR ESPAÑOL POPULATE THE OBJECT WITH ALL CLASS TABLE VALUES (I JUST KNOW HOW TO WRITE THE WORD 'ALL' IN PORTUGUESE AND SPANISH, BUT IF YOU WANT YOU CAN INTRODUCE ALL KIND OF 'ALL' YOU WANT TO ;) ) 
		elseif(is_string($_parameter)){
			if((strtoupper($_parameter) == 'ALL') 
					|| (strtoupper($_parameter) == 'TUDO') 
						|| (strtoupper($_parameter) == 'TODO')){
		
				$this->populateTO();
				$this->status = strtoupper($_parameter);
			}
			else{
				$this->status ='EMPTY';

			}
		}
		else{
			//CHECK IF IT IS A ARRAY OR A JSON
			//IF IS NOT A ARRAY TRY TO DECODE A JSON STRUCTURE TO A ARRAY
			if(!is_array($_parameter)){
            	$_parameter = json_decode(strtolower($_parameter), true);
			}
    	    //IF IT IS NEITHER A ARRAY NOR A JSON STRUCTURE THEN GET A ERROR
            if(!is_array($_parameter)){
                $this->getError()->setError("The parameter in the Class Instance need to be a Array or a Json data-type");
                $this->getError()->setErrorStatus(TRUE);
                $this->status = 'ERROR';
            }
            else{
            	
            	$CONT_CLAUSE_DATAS =0;
            	$pri = $this->primary_key;
				if(array_key_exists($pri,$_parameter)){
					if((is_numeric($_parameter[$pri])) || (!empty($_parameter[$pri])) ){
						$this->setId($_parameter[$pri]);
						$CONT_CLAUSE_DATAS++;

					}
				}
				if(array_key_exists('WHERE',$_parameter)){
					$this->setWhere($_parameter['WHERE']);
					$CONT_CLAUSE_DATAS++;
				}
				//IF IT HAS A NO_POPULATED_XX WITH TRUE VALUE SO THE OBJECT WILL NOT BE POPULATED
				if(array_key_exists('NO_POPULATE',$_parameter)){
					if($_parameter["NO_POPULATE"] == TRUE){
					$this->status = 'EMPTY';
						return;
					}
				}
				if($CONT_CLAUSE_DATAS >0){
					$populated = $this->populateTO();
					if($populated){
						$this->status = 'UPDATE';
					}
					else{
						$this->status = 'INSERT';
					}
				}
				else{
					$this->status = 'INSERT';
				}
				$this->setAtributeDatasArray($_parameter);
				if($this->status=='INSERT'){
					$this->populateTOByWeb();
				}
            }
		}		

	}

	public function select_page($_page = 0, $_row_number = 10, $_select_parameters = 'all', $_fields = array()){

			if( !( is_numeric($_page)) || !(is_numeric($_row_number))){

				$this->xuxuDB_error->setError("ERROR: The parameter pased to 'select_page' function needs to be a number");

				$this->setStatus("bad");

				return false;
			}else{

				if ($_page == 1) {

					$_page = 0;

				}

				$limit = $_page * $_row_number;

				parent::setLimit("$limit, $_row_number");

				$this->select($_select_parameters, $_fields);

				return true;

			}

	}

	public function total_page($_row_number = 10, $_select_parameters = 'all', $_fields = array()){

		$count = parent::count();
		if (isset($count[0]['total'])) {

			$this->total_page = $count[0]['total'];
		}
	}	

	//PARAMETERS THAT USED JUST FOR INFORMATION, NOT AS A TABLE FIELD NAME
	public function special_class_parameter_keys(){
		
		return array('primary_key','status','count','total_page','selected_fields');
	
	}

	public function special_class_parameter_suffix(){

		return array('_class', '_obj');

	}

	//take out all special class parameter that is used just for information not as table field name
	//Parameter: A array with the class parameters name
	//Parameter: $where informs where is value which needs to check the information
	    		//Two option: KEY or VALUE
				//If it is 'KEY' then the ARRAY KEY will be checked out
				//If it is 'VALUE' then the ARRAY VALUE will be checked out
				//Defualt: KEY.
	//Return: A array without the keys with any special name.
	public function take_out_special_class_parameter($array=''){

		if(empty($array)){

			$array = $this->getClassParameters();

		}
		
		$special = $this->special_class_parameter_keys();
		$special_suffix = $this->special_class_parameter_suffix();
		foreach($array as $key => $val ){

			if(in_array($val, $special) ){
				unset($array[$key]);
			}
			else{

				foreach($special_suffix as $kfix => $valfix){

					$varTemp="";
					$varTemp = substr($val, - strlen($valfix));

					if(in_array($varTemp, $special_suffix) ){
						unset($array[$key]);
					}
				}
			}

		}

		sort($array);

		return $array;
	}
	
}
?>