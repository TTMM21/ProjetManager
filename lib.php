<?php
//funtion of connection to mySQL
function getMysqlConnect($host, $dbname, $user, $pass){
    $connection = NULL;
      try
      {
          $connection = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8mb4', $user, $pass);
          $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      }
      catch (Exception $e){
          die('Erreur : ' . $e->getMessage());
      }
      return $connection;
  }

// function to recover data from bass
function execQuery($connection, $sqlString){
	$res = NULL;
	$stm = $connection->prepare($sqlString);
	if (!$stm) {
		echo "/nPDO::errorInfo():/n";
		print_r($connection->errorInfo());
	}else{
		$res = $connection->query($sqlString);
	}
	return $res;
}

function Connect(){
    $host = "127.0.0.1";
    $dbname = "projetmanager";
    $user = "BotWeb";
    $pass = "D5rxDm4gz1pFvF7R";
    $connection = getMySQLConnect($host,$dbname,$user,$pass); 
    return $connection;
}

//Display erreor message function
function ErreurMSG($MSG){
    session_start();
    
    $MSG ='<div class="card text-white bg-warning mb-3" style="width: 18rem;">
                <h5 >Error</h5>
                <div>
                    <p>'.$MSG.'</p>
                </div>
            </div>';
  $_SESSION["erreur"]=$MSG;
    if(isset($_SESSION["email"]) && $_SESSION["status"] == 2){
        header('Location: ./Vue/Table_folder.php');
        exit();
    
    }else{
    header('Location: ../Vue/login.php');
    exit();
    }
}

//Display valid message function
function ValidMSG($MSG){
    session_start();
    
    $MSG ='<div class="card text-white bg-success mb-3" style="width: 18rem;">
                <h5 class="card-title">Success</h5>
                <div class="card-body">
                    <p class="card-text">'.$MSG.'</p>
                </div>
            </div>';
  $_SESSION["erreur"]=$MSG;
    if(isset($_SESSION["email"]) && $_SESSION["status"] == 2){
        header('Location: ./Vue/Table_folder.php');
        exit();
    
    }else{
    header('Location: ../Vue/Login.php');
    exit();
    }
}



//Add password Function
function testurl($Setlogin) {
    $host = "127.0.0.1:3306";
    $dbname = "how2learn";
    $user = "root";
    $pass = "";
    $connection = getMySQLConnect($host,$dbname,$user,$pass);                  
    $sql ="SELECT `id` FROM `account` WHERE `password`='".$Setlogin."'";
    $result = execQuery($connection,$sql);
    foreach ($result as $results){
        $id = $results['id'];
    }
    return $id;
}




?>