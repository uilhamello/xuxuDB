<?php

$BASE = explode("/", $_SERVER["REQUEST_URI"]);

define("XUXU_PATH",$_SERVER["DOCUMENT_ROOT"]."/");

include(XUXU_PATH."/config/configs_paths.php");

$form = explode("&",$_POST["form"]);
if(count($form) != 5){
  die("<span class='error'>Error Form: in the informations sent.</span>");
}

$arrayConection = "";
foreach($form as $key => $value){
	$arrayFormDatas= explode("=",$value);
	if(count($arrayFormDatas) != 2){
		die("<span class='error'>Erro Field: in the informations sent</span>");
	}
	$arrayConection[$arrayFormDatas[0]] = $arrayFormDatas[1];

}

$drive=$arrayConection["db_driver"];
$host=$arrayConection["host"];
$dbname=$arrayConection["dbname"];
$user=$arrayConection["user"];
$pass=$arrayConection["password"];
$page=0;


$objFile = new FileXuxuDB();
/*********************************************************************************************************************
 CREATING THE CONFIGURATIONS DIRECTORY AND FILES :)
**********************************************************************************************************************/
$objFile->setDir($_SERVER["DOCUMENT_ROOT"]."/configurationXuxuDB");
$objFile->setMode(0775);

//Whether the configuration database directory not exist then create it.
if( ! $objFile->isDir() ){
			

	try{
		//check the Connection Datas out if they are correct
		$pdo = new PDO($drive.":host=".$host.";dbname=".$dbname, $user, $pass);
		$pdo = NULL;
	}catch(PDOException $e){
		die("<span class='error'>A ERROR TO CONNECT: ".$e."</span>");
	}


	if(!$objFile->createDir() ){
		die("<span class='error'>It has not been possible to create a directory named 'configurationXuxuDB' in: ".$objFile->getDir()."</span>");
	}
}

/*-----------------------------------------------------------------
 - CREATING THE INI CONNECTION CONFIGURATION FILE :)
------------------------------------------------------------------*/
$INIFILECONTENT="
[DB_PRODUCTION]
DRIVER=$drive
HOST=$host
DBNAME=$dbname
USER=$user
PASSWORD=$pass

[DB_DEVELOPMENT]
DRIVER=$drive
HOST=$host
DBNAME=$dbname
USER=$user
PASSWORD=$pass
";

//creating a db connection information file
$objFile->setFileName($objFile->getDir()."/db_conection.ini");
$objFile->setFileContent($INIFILECONTENT);
//PERMITION MODE
$objFile->setMode(0775);

if(!$objFile->createFile()){
	die("<span class='error'>It has not been possible to create a file named 'db_conection.ini' in: ".$objFile->getDir()."</span>");
}
/*********************************************************************************************************************
******* THE END OF DATABASE CONFIG CREATION :'(
**********************************************************************************************************************/


/*********************************************************************************************************************
******* CREATING THE TRANSFOR OBJECTS CLASS :)
**********************************************************************************************************************/

$objClassTO = new ClassTO();

//get the table information in the index sent by ajax
$tables = $objClassTO->getTablePagination($page);

//GET ALL PRIMARYKEY FROM DATABASE. IT WILL BE USED TO CHECK IF A TABLE FIELD IS A FOREIGNKEY
$primaryKeysTables = $objClassTO->allPrimaryKeys('id_instituicion');
//ORGANAZING THE TABLE FIELD ARRAY
$arrayKeys = array();
foreach($primaryKeysTables as $key => $val){
	$arrayKeys[$val ['COLUMN_NAME']]=$val['TABLE_NAME'];
}

/**********************************************************************************************************************
 PREPARING TO CREATE AND RECORDING THE PERSISTENCE_CLASS_FILE IN THE DIRECTORY PERSISTENCE
**********************************************************************************************************************/

//IT IS GETTING THE PERSISTENCE_CLASS STANDARD CONTENTS
$classContentTO = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/".$BASE[1]."/ClassTOStructure.php");

//IT IS GETTING THE FIELDS INFORMATIONS OF PERSISTENCE_CLASS 
$classContentInfoTO = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/".$BASE[1]."/ClassInfoTOStructure.php");

//SETTING THE DIRECTORY NAME WICH WILL STORE THE PERSISTENCE CLASS FILES
$objFile->setDir($_SERVER["DOCUMENT_ROOT"]."/persistence");
//PERMITION MODE
$objFile->setMode(0775);
//chmod($_SERVER["DOCUMENT_ROOT"]."/".$BASE[1]."/persistence", 0766);

//Whether the configuration database directory not exist then create it.
if( ! $objFile->isDir() ){
	if(!$objFile->createDir() ){
		die("<span class='error'>It has not been possible to create a directory named 'configurationXuxuDB' in: ".$objFile->getDir()."</span>");
	}
}

//Making a looping in every database tables to create a 'persistence_class' of each table;
foreach($tables as $key => $value){
	$objClassTO->setTable($value[0]);

	//It gots every curent loop table's fields
	$fieldsName = $objClassTO->tableFields();

	//variable that will have the class atributs
	$atributes = "";
	$atributes_info = "";
	$primaryKey="";
	for($i=0; $i<count($fieldsName); $i++){

		//FIELD NAME ATRIBUTE
		$atributes_info .= " \n/* TABLE FIELD: ".$fieldsName[$i]['Field']." ---------*/\n";
		$atributes .= "	private $".$fieldsName[$i]['Field']." = array();\n";
		//FIELD CAN OR NOT BE NULL
		$null = ( strtoupper($fieldsName[$i]['Null']) == 'YES')?'TRUE':'FALSE';
		$atributes_info .= "	private $".$fieldsName[$i]['Field']."_null = ".$null.";\n";

		//GETTING THE FIELD TYPE
		$fieldType = explode('(',$fieldsName[$i]['Type']);
		$atributes_info .= "	private $".$fieldsName[$i]['Field']."_type = '".trim($fieldType[0])."';\n";
		$fieldSize = array();

		if( count($fieldType) >1 ){
			$fieldSize = explode(')', $fieldType[1]);
		}
		if(!isset($fieldSize[0])){
			$fieldSize[0] = "";
		}

		if($fieldType[0] == 'enum'){

			$atributes_info .= "	private $".$fieldsName[$i]['Field']."_size = array(".$fieldSize[0].");\n";			

		}
		else{

			$atributes_info .= "	private $".$fieldsName[$i]['Field']."_size = '".trim($fieldSize[0])."';\n";			
		}

		if(strtoupper($fieldsName[$i]['Key']) == 'PRI'){
			$primaryKey = $fieldsName[$i]['Field'];
		}
		elseif(array_key_exists($fieldsName[$i]['Field'], $arrayKeys)){
			$atributes .= "	private $".$fieldsName[$i]['Field']."_class = '".ucfirst(strtolower($arrayKeys[$fieldsName[$i]['Field']]))."';\n";
			$atributes .= "	private $".$fieldsName[$i]['Field']."_obj = array();\n";
		}

	}

	$className = ucfirst(strtolower($value[0]));
	//REPLACE THE CONTENTS OF THE STRUTURE CLASS TO DATABASE TABLE DATAS, SUCH AS TABLE_NAME WICH ONE WILL BE A CLASS AND FILE NAME.
	$classContent = str_replace("{{class_name}}",$className,$classContentTO);
	$classContent = str_replace("{{parameter}}",$atributes,$classContent);
	$classContent = str_replace("{{primary_key}}",$primaryKey,$classContent);

	//CONTENTS OF INFO CLASSTO
	$classNameInfo = $className."_info";
	$classContentInfo = str_replace("{{class_name}}",$classNameInfo,$classContentInfoTO);
	$classContentInfo = str_replace("{{parameter}}",$atributes_info,$classContentInfo);
	
	/*-----------------------------------------------------------------
	 - CREATING THE PERSISTENCE CLASS FILE :)
	------------------------------------------------------------------*/
	$objFile->setFileName($objFile->getDir()."/".$className.".php");
	$objFile->setFileContent($classContent);
	if(!$objFile->createFile()){
		die("<span class='error'>It has not been possible to create a file named ".$className.".php in: ".$objFile->getDir()."</span>");
	}

	$objFile->setFileName($objFile->getDir()."/".$classNameInfo.".php");
	$objFile->setFileContent($classContentInfo);
	if(!$objFile->createFile()){
		die("<span class='error'>It has not been possible to create a file named ".$className.".php in: ".$objFile->getDir()."</span>");
	}
	/*********************************************************************************************************************
	******* THE END OF DATABASE CONFIG CREATION :'(
	**********************************************************************************************************************/
}
die("It has finished :)");

?>