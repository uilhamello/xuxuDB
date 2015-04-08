<?php

class Cf_examen_estado_nutricio_info{

 
/* TABLE FIELD: id_estado_nutricio ---------*/
	private $id_estado_nutricio_null = FALSE;
	private $id_estado_nutricio_type = 'int';
	private $id_estado_nutricio_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: estatura ---------*/
	private $estatura_null = FALSE;
	private $estatura_type = 'decimal';
	private $estatura_size = '5,1';
 
/* TABLE FIELD: estatura_sentado ---------*/
	private $estatura_sentado_null = FALSE;
	private $estatura_sentado_type = 'decimal';
	private $estatura_sentado_size = '5,1';
 
/* TABLE FIELD: peso ---------*/
	private $peso_null = FALSE;
	private $peso_type = 'decimal';
	private $peso_size = '5,1';
 
/* TABLE FIELD: peso_flexion ---------*/
	private $peso_flexion_null = FALSE;
	private $peso_flexion_type = 'decimal';
	private $peso_flexion_size = '5,1';
 
/* TABLE FIELD: porcentaje_grasa ---------*/
	private $porcentaje_grasa_null = FALSE;
	private $porcentaje_grasa_type = 'decimal';
	private $porcentaje_grasa_size = '5,1';
 
/* TABLE FIELD: cintura ---------*/
	private $cintura_null = FALSE;
	private $cintura_type = 'decimal';
	private $cintura_size = '5,1';
 
/* TABLE FIELD: longitud_brazo ---------*/
	private $longitud_brazo_null = FALSE;
	private $longitud_brazo_type = 'decimal';
	private $longitud_brazo_size = '5,1';



    public function __get($name){  

   		return $this->$name;

    }

}

?>