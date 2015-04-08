<?php

$BASE = explode("/", $_SERVER["REQUEST_URI"]);

define("XUXU_PATH",$_SERVER["DOCUMENT_ROOT"]."/");

include(XUXU_PATH."/config/configs_paths.php");

/*
if 'NULL' or No attribute is pased then is just an object without values;
if has pased a array without a class parameter associeted such as "array('any_thing_that_is_not_a_classTO_parameter')" then is just an object without values;
if there is not a id and not a where then it is a insert;
if there is a WHERE_XUXU OR a CLASS_ID VALUE then it is a update
if there is a WHERE_XUXU AND a CLASS_ID VALUE then it is a update of the WHERE_XUXU REGISTRATION where the CLASS_ID value in the table will be change to the CLASS_ID pased althogh array.
if pass a numeric value so it will be idenfied as a id and will query it in a database to populate the object

Methods to DML:
$obj->updateXUXU();
$obj->insertXUXU();
$obj->deleteXUXU();
$obj->updateInsertXUXU();

PARAMETER TO GET TRANSACTION STATUS:
$obj->status;

METHODS TO SELECT:
	TO SELECT JUST NEED TO PASS A PARAMETER TO THE CLASS YOU ARE INSTANTIATING. 
	THE POSSIBLE PARAMETERS ARE:
	ALL, TUDO, TODO : TO HAVE ALL TABLE DATAS
		EX: Class_table('TODO');
	ID (NUMBER): PASSING A NUMBER THAT IS A NUMBER ID
		EX: Class_table(15);
	ARRAY: PASSING A ARRAY AS KEY=>VALUE WHERE KEY IS THE CLASS ATTRIBUTE
		EX: $_POST[ID_TABLE] = 3
			$_POST[ID_TABLE] = 3
			Class_table($_POST)
		SPECIAL KEYS OF A ARRAY PARAMETER:
		WHERE_XUXU = 'WHERE_CLASE'
			EX: $_POST['WHERE_XUXU'] = 'ID_TABLE = 1 AND NAME LIKE "%MICHAEL%JACKSON%" '
		NO_POPULATE_XUXU = TRUE/FALSE
			IF TRUE, THE CLASS WILL NOT BE POPULATE WITH THE DATAS FROM DATABASE
			IF FALSE, THE CLASS WILL BE POPULATE. IT IS THE SAME AS DOES NOT SPECIFIC IT


*/
//$_POST['WHERE_XUXU'] ="login = 'cifxmx' and password='emc4QU0xVS80eCtHeGc5blR5bU4rUT09'";

/*
$_POST['nombre'] = "aaa new";
$obj = new Cf_categorias(5583);
*/

/*$array_usuario_acesso_log = array(
		"id_usuario"=>100,
		"inicio"=>date("Y-m-d H:i:s"),
		"aceso_ativo"=>1);

$user_log = new Sist_usuario_aceso_log($array_usuario_acesso_log);
*/

echo "<pre>";

//$coisa = new Sist_usuario_aceso_log(array("fin"=>date("Y-m-d H:i:s"), "id_usuario_aceso_log"=>1));
//$coisa->update();
//echo "<pre>";
//echo "ESTATUS: ".$user_log->status."<BR/>";
//echo "VALORES: <BR/>";
//print_r($user_log);

//$user_log->updateInsert();

//print_r(new Sist_usuario_aceso_log(1));

//$_POST['WHERE_XTO'] ="id_usuario=1";

$obj = new Cf_usuario_temporal();

$consulta = $obj->setConnect();

$obj->total_page();
$obj->select_page(1);
if($obj->count > 0){

	print_r($obj);

}


?>