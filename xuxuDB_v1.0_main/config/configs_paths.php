<?php
$BASE = explode("/", $_SERVER["REQUEST_URI"]);

$key = array_search('xuxuDB', $BASE);
$AllBase = '';

for($i=0;$i<=$key;$i++){
  if(!empty($BASE[$i])){
    $AllBase .=$BASE[$i];
  }
}

function __autoload($CLASS){

  if(file_exists(XUXU_PATH."config/".$CLASS.".php")){
        include_once(XUXU_PATH."config/".$CLASS.".php");
  }
  elseif(file_exists(XUXU_PATH."core/".$CLASS.".php")){
      include_once XUXU_PATH."core/".$CLASS.".php";
  }
  elseif(file_exists(XUXU_PATH."persistence/".$CLASS.".php")){
      include_once XUXU_PATH."persistence/".$CLASS.".php";
  }
  elseif(file_exists(XUXU_PATH."viewXuxuDB/".$CLASS.".php")){
      include_once XUXU_PATH."viewXuxuDB/".$CLASS.".php";
  }
  else{

      /*******************************************************
      It checks out if exist the session variable "PROJECT_PATHS"
      if so, it checks if the class file exist in any directory listed up. 
      *******************************************************/
      //stat the global SESSION variable 
      if(!isset($_SESSION)){session_start();}
      //if not exist the key PROJECT_PATHS in the SESSION checks if exist the file "project_paths.php" 
      //and if so, it checks if exist the Array $PROJECT_PATHS, If so then pass the $PROJECT_PATHS values to the $_SESSION['PROJECT_PATHS']
      if(!isset($_SESSION['PROJECT_PATHS'])){

          $_SESSION['PROJECT_PATHS'] = NULL;

          if(file_exists($_SERVER['DOCUMENT_ROOT']."project_paths.php")){

              require($_SERVER['DOCUMENT_ROOT']."project_paths.php");
          
          }
          else{

              require(XUXU_PATH."project_paths_example.php");
      
          }

          if(isset($PROJECT_PATHS)){

              $_SESSION['PROJECT_PATHS'] = $PROJECT_PATHS;
          }
      }

      $found = FALSE;
      for($i=0; $i < count($_SESSION['PROJECT_PATHS']); $i++){
          if(file_exists($_SESSION['PROJECT_PATHS'][$i]."/".$CLASS.".php")){

            include_once($_SESSION['PROJECT_PATHS'][$i]."/".$CLASS.".php");
            $found = TRUE;
            break;
          }
      }

      if(!$found){
        echo "Class File not found: ".$CLASS;
      }
  }
}