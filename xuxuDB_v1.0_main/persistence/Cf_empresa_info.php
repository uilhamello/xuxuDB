<?php

class Cf_empresa_info{

 
/* TABLE FIELD: id_empresa ---------*/
	private $id_empresa_null = FALSE;
	private $id_empresa_type = 'int';
	private $id_empresa_size = '11';
 
/* TABLE FIELD: razon_social ---------*/
	private $razon_social_null = FALSE;
	private $razon_social_type = 'char';
	private $razon_social_size = '50';
 
/* TABLE FIELD: rfc ---------*/
	private $rfc_null = TRUE;
	private $rfc_type = 'char';
	private $rfc_size = '15';
 
/* TABLE FIELD: nombre_corto ---------*/
	private $nombre_corto_null = FALSE;
	private $nombre_corto_type = 'char';
	private $nombre_corto_size = '30';
 
/* TABLE FIELD: correo ---------*/
	private $correo_null = FALSE;
	private $correo_type = 'char';
	private $correo_size = '60';
 
/* TABLE FIELD: code ---------*/
	private $code_null = FALSE;
	private $code_type = 'char';
	private $code_size = '3';
 
/* TABLE FIELD: id_ciudad ---------*/
	private $id_ciudad_null = FALSE;
	private $id_ciudad_type = 'int';
	private $id_ciudad_size = '11';
 
/* TABLE FIELD: id_delegacion_municipio ---------*/
	private $id_delegacion_municipio_null = FALSE;
	private $id_delegacion_municipio_type = 'int';
	private $id_delegacion_municipio_size = '11';
 
/* TABLE FIELD: codigo_postal ---------*/
	private $codigo_postal_null = FALSE;
	private $codigo_postal_type = 'int';
	private $codigo_postal_size = '11';
 
/* TABLE FIELD: colonia ---------*/
	private $colonia_null = FALSE;
	private $colonia_type = 'varchar';
	private $colonia_size = '45';
 
/* TABLE FIELD: domicilio ---------*/
	private $domicilio_null = FALSE;
	private $domicilio_type = 'tinytext';
	private $domicilio_size = '';
 
/* TABLE FIELD: numero_interior ---------*/
	private $numero_interior_null = FALSE;
	private $numero_interior_type = 'int';
	private $numero_interior_size = '11';
 
/* TABLE FIELD: numero_exterior ---------*/
	private $numero_exterior_null = FALSE;
	private $numero_exterior_type = 'int';
	private $numero_exterior_size = '11';
 
/* TABLE FIELD: telefono_principal ---------*/
	private $telefono_principal_null = FALSE;
	private $telefono_principal_type = 'tinytext';
	private $telefono_principal_size = '';
 
/* TABLE FIELD: telefono_alterno ---------*/
	private $telefono_alterno_null = FALSE;
	private $telefono_alterno_type = 'tinytext';
	private $telefono_alterno_size = '';



    public function __get($name){  

   		return $this->$name;

    }

}

?>