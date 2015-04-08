<?php

class Cf_desempeno_fisico_info{

 
/* TABLE FIELD: id_desempeno_fisico ---------*/
	private $id_desempeno_fisico_null = FALSE;
	private $id_desempeno_fisico_type = 'int';
	private $id_desempeno_fisico_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: equilibrio ---------*/
	private $equilibrio_null = FALSE;
	private $equilibrio_type = 'tinyint';
	private $equilibrio_size = '2';
 
/* TABLE FIELD: velocidad ---------*/
	private $velocidad_null = FALSE;
	private $velocidad_type = 'tinyint';
	private $velocidad_size = '2';
 
/* TABLE FIELD: flexibilidad ---------*/
	private $flexibilidad_null = FALSE;
	private $flexibilidad_type = 'tinyint';
	private $flexibilidad_size = '2';
 
/* TABLE FIELD: fuerza_brazos1 ---------*/
	private $fuerza_brazos1_null = FALSE;
	private $fuerza_brazos1_type = 'tinyint';
	private $fuerza_brazos1_size = '2';
 
/* TABLE FIELD: fuerza_brazos2 ---------*/
	private $fuerza_brazos2_null = FALSE;
	private $fuerza_brazos2_type = 'tinyint';
	private $fuerza_brazos2_size = '2';
 
/* TABLE FIELD: fuerza_brazos3 ---------*/
	private $fuerza_brazos3_null = FALSE;
	private $fuerza_brazos3_type = 'tinyint';
	private $fuerza_brazos3_size = '2';
 
/* TABLE FIELD: fuerza_abdominal ---------*/
	private $fuerza_abdominal_null = FALSE;
	private $fuerza_abdominal_type = 'tinyint';
	private $fuerza_abdominal_size = '2';
 
/* TABLE FIELD: salto_vertical ---------*/
	private $salto_vertical_null = FALSE;
	private $salto_vertical_type = 'tinyint';
	private $salto_vertical_size = '2';



    public function __get($name){  

   		return $this->$name;

    }

}

?>