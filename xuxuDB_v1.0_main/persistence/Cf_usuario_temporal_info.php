<?php

class Cf_usuario_temporal_info{

 
/* TABLE FIELD: id_usuario_temporal ---------*/
	private $id_usuario_temporal_null = FALSE;
	private $id_usuario_temporal_type = 'int';
	private $id_usuario_temporal_size = '8';
 
/* TABLE FIELD: nombre ---------*/
	private $nombre_null = FALSE;
	private $nombre_type = 'varchar';
	private $nombre_size = '255';
 
/* TABLE FIELD: apellido ---------*/
	private $apellido_null = FALSE;
	private $apellido_type = 'varchar';
	private $apellido_size = '255';
 
/* TABLE FIELD: login ---------*/
	private $login_null = FALSE;
	private $login_type = 'varchar';
	private $login_size = '45';
 
/* TABLE FIELD: password ---------*/
	private $password_null = FALSE;
	private $password_type = 'varchar';
	private $password_size = '45';
 
/* TABLE FIELD: Code ---------*/
	private $Code_null = FALSE;
	private $Code_type = 'char';
	private $Code_size = '3';
 
/* TABLE FIELD: sexo ---------*/
	private $sexo_null = FALSE;
	private $sexo_type = 'enum';
	private $sexo_size = array('M','F');
 
/* TABLE FIELD: fecha_nacimiento ---------*/
	private $fecha_nacimiento_null = FALSE;
	private $fecha_nacimiento_type = 'date';
	private $fecha_nacimiento_size = '';
 
/* TABLE FIELD: correo ---------*/
	private $correo_null = FALSE;
	private $correo_type = 'varchar';
	private $correo_size = '100';
 
/* TABLE FIELD: fecha_registro ---------*/
	private $fecha_registro_null = FALSE;
	private $fecha_registro_type = 'datetime';
	private $fecha_registro_size = '';



    public function __get($name){  

   		return $this->$name;

    }

}

?>