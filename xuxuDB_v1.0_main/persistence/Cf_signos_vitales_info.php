<?php

class Cf_signos_vitales_info{

 
/* TABLE FIELD: id_signos_vitales ---------*/
	private $id_signos_vitales_null = FALSE;
	private $id_signos_vitales_type = 'int';
	private $id_signos_vitales_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: saturacion ---------*/
	private $saturacion_null = FALSE;
	private $saturacion_type = 'tinyint';
	private $saturacion_size = '3';
 
/* TABLE FIELD: pulso ---------*/
	private $pulso_null = FALSE;
	private $pulso_type = 'tinyint';
	private $pulso_size = '3';
 
/* TABLE FIELD: sistolica ---------*/
	private $sistolica_null = FALSE;
	private $sistolica_type = 'tinyint';
	private $sistolica_size = '3';
 
/* TABLE FIELD: diastolica ---------*/
	private $diastolica_null = FALSE;
	private $diastolica_type = 'tinyint';
	private $diastolica_size = '3';



    public function __get($name){  

   		return $this->$name;

    }

}

?>