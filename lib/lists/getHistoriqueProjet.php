<?php

function getAllProjectsList($id_equipes) {
  $connection = Connect();
  $sth = $connection->prepare("SELECT * FROM historique_projet where id_equipes = $id_equipes");
  $sth->execute();
  $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
  return $result;
}

function getAllHistoriqueProjectsList($id_comptes) {
    $connection = Connect();
    $sth = $connection->prepare("SELECT * FROM historique_projet where id_comptes = ".$id_comptes.";");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }

  function SetHistoriqueProjects( $id_projet,$id_comptes) {
    $connection = Connect();
    $sth = $connection->prepare("SELECT id_taches FROM taches ORDER BY id_taches DESC LIMIT 1;");
    $sth->execute();
    $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

    foreach($result as $rt){
       $id_tache=$rt['id_taches'];
    }


    $connection2 = Connect();
    $sth2 = $connection2->prepare("INSERT INTO historique_projet (id_comptes, id_projet,id_taches) VALUES ('".$id_comptes."','".$id_projet."','".$id_tache."');");
    $sth2->execute();
    $result2 = $sth2->fetchAll(\PDO::FETCH_ASSOC);
    return $result2;
  }


?> 