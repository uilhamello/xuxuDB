<?php

class Cf_examen_info{

 
/* TABLE FIELD: id_examen ---------*/
	private $id_examen_null = FALSE;
	private $id_examen_type = 'int';
	private $id_examen_size = '11';
 
/* TABLE FIELD: id_usuario ---------*/
	private $id_usuario_null = FALSE;
	private $id_usuario_type = 'int';
	private $id_usuario_size = '11';
 
/* TABLE FIELD: id_institucion ---------*/
	private $id_institucion_null = FALSE;
	private $id_institucion_type = 'int';
	private $id_institucion_size = '11';
 
/* TABLE FIELD: fecha_hora ---------*/
	private $fecha_hora_null = FALSE;
	private $fecha_hora_type = 'datetime';
	private $fecha_hora_size = '';
 
/* TABLE FIELD: resultado ---------*/
	private $resultado_null = TRUE;
	private $resultado_type = 'varchar';
	private $resultado_size = '45';



    public function __get($name){  

   		return $this->$name;

    }

}

?>