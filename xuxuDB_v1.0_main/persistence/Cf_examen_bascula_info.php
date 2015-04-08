<?php

class Cf_examen_bascula_info{

 
/* TABLE FIELD: id_bascula ---------*/
	private $id_bascula_null = FALSE;
	private $id_bascula_type = 'int';
	private $id_bascula_size = '11';
 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: edad_metabolica ---------*/
	private $edad_metabolica_null = FALSE;
	private $edad_metabolica_type = 'tinyint';
	private $edad_metabolica_size = '3';
 
/* TABLE FIELD: metabolismo_basal ---------*/
	private $metabolismo_basal_null = FALSE;
	private $metabolismo_basal_type = 'tinyint';
	private $metabolismo_basal_size = '3';
 
/* TABLE FIELD: masa_muscular ---------*/
	private $masa_muscular_null = FALSE;
	private $masa_muscular_type = 'tinyint';
	private $masa_muscular_size = '3';
 
/* TABLE FIELD: grasa_brazo_derecho ---------*/
	private $grasa_brazo_derecho_null = FALSE;
	private $grasa_brazo_derecho_type = 'tinyint';
	private $grasa_brazo_derecho_size = '3';
 
/* TABLE FIELD: masa_brazo_derecho ---------*/
	private $masa_brazo_derecho_null = FALSE;
	private $masa_brazo_derecho_type = 'tinyint';
	private $masa_brazo_derecho_size = '3';
 
/* TABLE FIELD: grasa_brazo_izquierdo ---------*/
	private $grasa_brazo_izquierdo_null = FALSE;
	private $grasa_brazo_izquierdo_type = 'tinyint';
	private $grasa_brazo_izquierdo_size = '3';
 
/* TABLE FIELD: masa_brazo_izquierdo ---------*/
	private $masa_brazo_izquierdo_null = FALSE;
	private $masa_brazo_izquierdo_type = 'tinyint';
	private $masa_brazo_izquierdo_size = '3';
 
/* TABLE FIELD: porcentaje_agua ---------*/
	private $porcentaje_agua_null = FALSE;
	private $porcentaje_agua_type = 'tinyint';
	private $porcentaje_agua_size = '3';
 
/* TABLE FIELD: grasa_torso ---------*/
	private $grasa_torso_null = FALSE;
	private $grasa_torso_type = 'tinyint';
	private $grasa_torso_size = '3';
 
/* TABLE FIELD: masa_torso ---------*/
	private $masa_torso_null = FALSE;
	private $masa_torso_type = 'tinyint';
	private $masa_torso_size = '3';
 
/* TABLE FIELD: masa_osea ---------*/
	private $masa_osea_null = FALSE;
	private $masa_osea_type = 'tinyint';
	private $masa_osea_size = '3';
 
/* TABLE FIELD: masa_visceral ---------*/
	private $masa_visceral_null = FALSE;
	private $masa_visceral_type = 'tinyint';
	private $masa_visceral_size = '3';
 
/* TABLE FIELD: grasa_visceral ---------*/
	private $grasa_visceral_null = FALSE;
	private $grasa_visceral_type = 'tinyint';
	private $grasa_visceral_size = '3';
 
/* TABLE FIELD: grasa_pierna_derecha ---------*/
	private $grasa_pierna_derecha_null = FALSE;
	private $grasa_pierna_derecha_type = 'tinyint';
	private $grasa_pierna_derecha_size = '3';
 
/* TABLE FIELD: masa_pierna_derecha ---------*/
	private $masa_pierna_derecha_null = FALSE;
	private $masa_pierna_derecha_type = 'tinyint';
	private $masa_pierna_derecha_size = '3';
 
/* TABLE FIELD: grasa_pierna_izquierda ---------*/
	private $grasa_pierna_izquierda_null = FALSE;
	private $grasa_pierna_izquierda_type = 'tinyint';
	private $grasa_pierna_izquierda_size = '3';
 
/* TABLE FIELD: masa_pierna_izquierda ---------*/
	private $masa_pierna_izquierda_null = FALSE;
	private $masa_pierna_izquierda_type = 'tinyint';
	private $masa_pierna_izquierda_size = '3';



    public function __get($name){  

   		return $this->$name;

    }

}

?>