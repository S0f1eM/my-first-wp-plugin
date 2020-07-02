<?php include_once(PLUGIN_DIR .  "includes/restricted/smwp_connect_db.php") ?>

<?php

//effacer une personne de l'annuaire
function smwpDeletePerson() {

	global $connection;

	if(isset($_POST['delete'])) {
	
    $result = $connection->prepare("DELETE from annuaire WHERE id = :id;") or die(print_r($connection->errorInfo()));
    $result->bindValue('id',sanitize_text_field($_POST['id']), PDO::PARAM_INT);
    $result->execute();
	
	if ($result) {

         include(PLUGIN_DIR . "includes/views/infoUpdate.php");
      }
    }
  }


  
//effacer une unité de l'annuaire
function smwpDeleteLab() {
  
  global $connection;
  if(isset($_POST['submit'])) {

     $result = $connection->prepare("UPDATE annuaire SET affectation = '' WHERE affectation = :dropaffectation;") or die(print_r($connection->errorInfo()));
     $result->bindValue('dropaffectation', sanitize_text_field($_POST['affectation']), PDO::PARAM_STR);
     $result->execute();
	
    if ($result)
         {
          
         include(PLUGIN_DIR . "includes/views/infoUpdate.php");

        }
    }

  if(isset($_POST['delete'])) {

     $result = $connection->prepare("DELETE from annuaire WHERE affectation = :dropaffectation;") or die(print_r($connection->errorInfo()));
     $result->bindValue('dropaffectation', sanitize_text_field($_POST['affectation']), PDO::PARAM_STR);
     $result->execute();
  
    if ($result)
         {
          
         include(PLUGIN_DIR . "includes/views/infoUpdate.php");

        }
    }


  }

  function smwpDeleteAddress()  {

  global $connection;

  if(isset($_POST['submit'])) {

     $req = $connection->prepare("UPDATE annuaire SET adresse ='1' WHERE adresse = :adresse;") or die(print_r($connection->errorInfo()));
     $req->bindValue( ':adresse', sanitize_text_field($_POST['adresse']), PDO::PARAM_INT);
     $req->execute();
  
      if ($req) {
      /*
      $result = $connection->prepare("DELETE FROM adresses WHERE adresses.id = :id;") or die(print_r($connection->errorInfo()));
      $result->bindValue('id', sanitize_text_field($id), PDO::PARAM_INT);
      $result->execute();
         */
         {
          
         include(PLUGIN_DIR . "includes/views/infoUpdate.php");

        }
    }

 }

}