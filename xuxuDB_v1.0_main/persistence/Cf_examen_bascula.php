<?php

class Cf_examen_bascula extends ClassTO implements InterfaceTO{

	private $id_bascula = array();
	private $id_examen = array();
	private $id_examen_class = 'Cf_examen';
	private $id_examen_obj = array();
	private $edad_metabolica = array();
	private $metabolismo_basal = array();
	private $masa_muscular = array();
	private $grasa_brazo_derecho = array();
	private $masa_brazo_derecho = array();
	private $grasa_brazo_izquierdo = array();
	private $masa_brazo_izquierdo = array();
	private $porcentaje_agua = array();
	private $grasa_torso = array();
	private $masa_torso = array();
	private $masa_osea = array();
	private $masa_visceral = array();
	private $grasa_visceral = array();
	private $grasa_pierna_derecha = array();
	private $masa_pierna_derecha = array();
	private $grasa_pierna_izquierda = array();
	private $masa_pierna_izquierda = array();

	private $primary_key = 'id_bascula';

	/*--------------------------------------------------------------------------------------------------------
	   EVERY "TO CLASSES" WILL HAVE THE CODE AS SIMILAR AS BELOW. 
	   JUST CHANGE ITS ATRIBUTES AND SOME INFORMATIONS PASSED FOR THE FATHER CLASS IN THE __CONSTRUCT
	--------------------------------------------------------------------------------------------------------*/

	public function __construct($_parameter ="", $_fields = array()){

		parent::__construct();

		parent::setChildClass($this);

		parent::setFields($_fields);

		parent::select($_parameter);

	}

	public function getForeign($_foreign){

		//If it has no value, just populare it
		if( count($this->{$_foreign."_obj"}) < 1)
		{

			if(count($this->$_foreign) < 1){
				return false;
			}

			if( is_array( $this->$_foreign ) ){
				foreach ($this->$_foreign as $key => $value) {
				 	$this->{$_foreign."_obj"}[$value] = new $this->{$_foreign."_class"}("$value");
				}
			}
		}
	}

    public function __get($name){  

    	$_atributos_class = parent::getClassParameters();

        if (in_array($name, $_atributos_class )) {

        	//check if it is a foreign_key object class atribute, if so, just calls the foreign function to get the foreign class datas 
	    	if(substr($name, -4) == "_obj"){

	    		if(in_array(substr($name,0, -4), $_atributos_class )){
	    			$this->getForeign(substr($name,0, -4));
	    		}
	    	}

	    	if(is_array($this->$name)){
	            if( count($this->$name) == 1 ){
	            	$arrayValues = array_values($this->$name);
					return array_shift($arrayValues);
	            }
	            else{
	            	return $this->$name;
	            }
	    	}
	    	else{
	    		return $this->$name;
	    	}
        }

    }

    public function __set($name, $value){

    		//The class parameters have to be a Array type
	    	if(!is_array($this->$name)){
	    		
				$this->$name = $value;	    		
	    	}
	    	else{

		    	array_push($this->$name, $value);
	    	}
    
    }

}

?>