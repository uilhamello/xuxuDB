<?php

class Cf_examen_postura_info{

 
/* TABLE FIELD: id_postura ---------*/
	private $id_postura_null = FALSE;
	private $id_postura_type = 'int';
	private $id_postura_size = '11';
 
/* TABLE FIELD: escoliosis ---------*/
	private $escoliosis_null = TRUE;
	private $escoliosis_type = 'enum';
	private $escoliosis_size = array('I','N','D');
 
/* TABLE FIELD: lordosis ---------*/
	private $lordosis_null = TRUE;
	private $lordosis_type = 'enum';
	private $lordosis_size = array('N','A');
 
/* TABLE FIELD: cifosis ---------*/
	private $cifosis_null = TRUE;
	private $cifosis_type = 'enum';
	private $cifosis_size = array('N','A');
 
/* TABLE FIELD: cadera ---------*/
	private $cadera_null = TRUE;
	private $cadera_type = 'enum';
	private $cadera_size = array('I','N','D');
 
/* TABLE FIELD: rodilla ---------*/
	private $rodilla_null = TRUE;
	private $rodilla_type = 'enum';
	private $rodilla_size = array('VR','N','VL');
 
/* TABLE FIELD: pies ---------*/
	private $pies_null = TRUE;
	private $pies_type = 'enum';
	private $pies_size = array('P','N','C');



    public function __get($name){  

   		return $this->$name;

    }

}

?>