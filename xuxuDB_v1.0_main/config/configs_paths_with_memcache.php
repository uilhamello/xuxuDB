<?php
$BASE = explode("/", $_SERVER["REQUEST_URI"]);

$key = array_search('xuxuDB', $BASE);
$AllBase = '';

for($i=0;$i<=$key;$i++){
  if(!empty($BASE[$i])){
    $AllBase .=$BASE[$i];
  }
}

function autoload_xuxuDB($CLASS){


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
      It checks out if exist the PHPSession/MemCache variable "PROJECT_PATHS"
      if so, then it will check if the class file exist in any directory listed up. 
      *******************************************************/
      //stat the global SESSION variable
      try{

          $memCache = new Memcache();
          $memCache->connect(MEMCACHED_HOST, MEMCACHED_PORT);
          $PROJECT_PATHS = $memCache->get(md5("PROJECT_PATHS"));

          if(empty($PROJECT_PATHS)){

              if(file_exists($_SERVER['DOCUMENT_ROOT']."project_paths.php")){

                      require($_SERVER['DOCUMENT_ROOT']."project_paths.php");
              
              }
              else{

                      require(XUXU_PATH."project_paths_example.php");
          
              }

              if(isset($PROJECT_PATHS)){
                  $memCache->set(md5("PROJECT_PATHS"),$PROJECT_PATHS);

              }
          }
      }
      catch(Exception $e){

          echo "Fail: " . $e->getMessage() . PHP_EOL;

      }

      //if not exist the key PROJECT_PATHS in the SESSION checks if exist the file "project_paths.php" 
      //and if so, it checks if exist the Array $PROJECT_PATHS, If so then pass the $PROJECT_PATHS values to the $PROJECT_PATHS
      $found = FALSE;
      for($i=0; $i < count($PROJECT_PATHS); $i++){
          if(file_exists($PROJECT_PATHS[$i]."/".$CLASS.".php")){

            include_once($PROJECT_PATHS[$i]."/".$CLASS.".php");
            $found = TRUE;
            break;
          }
      }

      if(!$found){
        echo "Class File not found: ".$CLASS;
      }
  }
}