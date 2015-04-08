<?php

class Cf_usuario_acesso_log_info{

 
/* TABLE FIELD: id_usuario_acesso_log ---------*/
	private $id_usuario_acesso_log_null = FALSE;
	private $id_usuario_acesso_log_type = 'int';
	private $id_usuario_acesso_log_size = '11';
 
/* TABLE FIELD: id_usuario ---------*/
	private $id_usuario_null = FALSE;
	private $id_usuario_type = 'int';
	private $id_usuario_size = '8';
 
/* TABLE FIELD: inicio ---------*/
	private $inicio_null = FALSE;
	private $inicio_type = 'datetime';
	private $inicio_size = '';
 
/* TABLE FIELD: aceso_ativo ---------*/
	private $aceso_ativo_null = TRUE;
	private $aceso_ativo_type = 'int';
	private $aceso_ativo_size = '1';
 
/* TABLE FIELD: fin ---------*/
	private $fin_null = TRUE;
	private $fin_type = 'datetime';
	private $fin_size = '';



    public function __get($name){  

   		return $this->$name;

    }

}

?>