<?php

class Cf_examen_condicion_fisica_info{

 
/* TABLE FIELD: id_condicion_fisica ---------*/
	private $id_condicion_fisica_null = FALSE;
	private $id_condicion_fisica_type = 'int';
	private $id_condicion_fisica_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: course_navette ---------*/
	private $course_navette_null = FALSE;
	private $course_navette_type = 'tinyint';
	private $course_navette_size = '2';
 
/* TABLE FIELD: saturacion_actividad ---------*/
	private $saturacion_actividad_null = FALSE;
	private $saturacion_actividad_type = 'tinyint';
	private $saturacion_actividad_size = '3';
 
/* TABLE FIELD: pulso_actividad ---------*/
	private $pulso_actividad_null = FALSE;
	private $pulso_actividad_type = 'tinyint';
	private $pulso_actividad_size = '3';



    public function __get($name){  

   		return $this->$name;

    }

}

?>