<?php

class Cf_quimica_sanguinea_info{

 
/* TABLE FIELD: id_quimica_sanguinea ---------*/
	private $id_quimica_sanguinea_null = FALSE;
	private $id_quimica_sanguinea_type = 'int';
	private $id_quimica_sanguinea_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: colesterol ---------*/
	private $colesterol_null = FALSE;
	private $colesterol_type = 'tinyint';
	private $colesterol_size = '3';
 
/* TABLE FIELD: trigliceridos ---------*/
	private $trigliceridos_null = FALSE;
	private $trigliceridos_type = 'tinyint';
	private $trigliceridos_size = '3';
 
/* TABLE FIELD: glucosa ---------*/
	private $glucosa_null = FALSE;
	private $glucosa_type = 'tinyint';
	private $glucosa_size = '3';
 
/* TABLE FIELD: acido_lactico ---------*/
	private $acido_lactico_null = FALSE;
	private $acido_lactico_type = 'float';
	private $acido_lactico_size = '3,2';



    public function __get($name){  

   		return $this->$name;

    }

}

?>