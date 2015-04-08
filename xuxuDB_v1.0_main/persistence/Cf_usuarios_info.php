<?php

class Cf_usuarios_info{

 
/* TABLE FIELD: id_usuario ---------*/
	private $id_usuario_null = FALSE;
	private $id_usuario_type = 'int';
	private $id_usuario_size = '8';
 
/* TABLE FIELD: nombre ---------*/
	private $nombre_null = FALSE;
	private $nombre_type = 'varchar';
	private $nombre_size = '255';
 
/* TABLE FIELD: apellido ---------*/
	private $apellido_null = FALSE;
	private $apellido_type = 'varchar';
	private $apellido_size = '255';
 
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
 
/* TABLE FIELD: curp ---------*/
	private $curp_null = TRUE;
	private $curp_type = 'char';
	private $curp_size = '18';
 
/* TABLE FIELD: correo ---------*/
	private $correo_null = FALSE;
	private $correo_type = 'varchar';
	private $correo_size = '100';
 
/* TABLE FIELD: id_estado ---------*/
	private $id_estado_null = TRUE;
	private $id_estado_type = 'tinyint';
	private $id_estado_size = '2';
 
/* TABLE FIELD: id_delegacion ---------*/
	private $id_delegacion_null = TRUE;
	private $id_delegacion_type = 'tinyint';
	private $id_delegacion_size = '2';
 
/* TABLE FIELD: codigo_postal ---------*/
	private $codigo_postal_null = TRUE;
	private $codigo_postal_type = 'char';
	private $codigo_postal_size = '5';
 
/* TABLE FIELD: domicilio ---------*/
	private $domicilio_null = TRUE;
	private $domicilio_type = 'text';
	private $domicilio_size = '';
 
/* TABLE FIELD: numero_interior ---------*/
	private $numero_interior_null = TRUE;
	private $numero_interior_type = 'int';
	private $numero_interior_size = '8';
 
/* TABLE FIELD: numero_exterior ---------*/
	private $numero_exterior_null = TRUE;
	private $numero_exterior_type = 'int';
	private $numero_exterior_size = '8';
 
/* TABLE FIELD: telefono_particular ---------*/
	private $telefono_particular_null = TRUE;
	private $telefono_particular_type = 'char';
	private $telefono_particular_size = '11';
 
/* TABLE FIELD: telefono_alterno ---------*/
	private $telefono_alterno_null = TRUE;
	private $telefono_alterno_type = 'char';
	private $telefono_alterno_size = '11';
 
/* TABLE FIELD: telefono_movil ---------*/
	private $telefono_movil_null = TRUE;
	private $telefono_movil_type = 'char';
	private $telefono_movil_size = '11';
 
/* TABLE FIELD: id_sector ---------*/
	private $id_sector_null = TRUE;
	private $id_sector_type = 'tinyint';
	private $id_sector_size = '1';
 
/* TABLE FIELD: id_categoria ---------*/
	private $id_categoria_null = TRUE;
	private $id_categoria_type = 'tinyint';
	private $id_categoria_size = '1';
 
/* TABLE FIELD: login ---------*/
	private $login_null = FALSE;
	private $login_type = 'varchar';
	private $login_size = '100';
 
/* TABLE FIELD: password ---------*/
	private $password_null = FALSE;
	private $password_type = 'char';
	private $password_size = '32';
 
/* TABLE FIELD: imagen ---------*/
	private $imagen_null = TRUE;
	private $imagen_type = 'text';
	private $imagen_size = '';
 
/* TABLE FIELD: esta_activo ---------*/
	private $esta_activo_null = TRUE;
	private $esta_activo_type = 'tinyint';
	private $esta_activo_size = '1';
 
/* TABLE FIELD: es_admin ---------*/
	private $es_admin_null = TRUE;
	private $es_admin_type = 'tinyint';
	private $es_admin_size = '1';
 
/* TABLE FIELD: fecha_registro ---------*/
	private $fecha_registro_null = FALSE;
	private $fecha_registro_type = 'datetime';
	private $fecha_registro_size = '';



    public function __get($name){  

   		return $this->$name;

    }

}

?>