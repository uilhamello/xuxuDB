<?php

class ErrorFunctionality{

    private $error;
    private $warning;
    private $msj_error;
    private $error_status;



    public function __construct(){
        
        $this->setError(false);
        $this->setWarning(false);

    }

    public function setErrorStatus($_status){
        $this->error_status = $_status;
    }

    public function getErrorStatus(){
        return $this->error_status;
    }

    public function getError(){
    
        return $this->error;

    }

    public function setError($_error){
        
        $this->error = $_error;

    }

    public function getWarning(){
        
        return $this->warning;

    }

    public function setWarning($_warning){
        
        $this->warning = $_warning;

    }

    public function getMsjError(){
        
        return $this->msj_error;

    }

    public function setMsjError($_msj_error){
        
        $this->msj_error = $_msj_error;

    }

    public function errorFormated($_error=""){

        if(trim($_error) ==""){

            $_error = $this->msj_error;
        }

        return "<div class='error_sistem' style='color: rgb(255, 0, 0); margin: 11% 11% 11% 27%; border: 1px solid rgb(255, 0, 0); width: 800px; height: 132px; background: none repeat scroll 0% 0% #ddd; text-align:center'><br>".$_error."</div>";

    }

    
}

?>
