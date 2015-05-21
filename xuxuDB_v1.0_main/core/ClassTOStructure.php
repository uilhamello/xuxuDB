<?php

class {{class_name}} extends ClassTO implements InterfaceTO{

{{parameter}}
	private $primary_key = '{{primary_key}}';

	/*--------------------------------------------------------------------------------------------------------
	   EVERY "TO CLASSES" WILL HAVE THE CODE AS SIMILAR AS BELOW. 
	   JUST CHANGE ITS ATRIBUTES AND SOME INFORMATIONS PASSED FOR THE FATHER CLASS IN THE __CONSTRUCT
	--------------------------------------------------------------------------------------------------------*/

	public function __construct($_parameter ="", $_fields = array()){

		parent::setTable(strtolower(get_class()));

		parent::__construct();

		parent::setChildClass($this);

		parent::setFields($_fields);

		$this->selected_fields = $_fields;

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
