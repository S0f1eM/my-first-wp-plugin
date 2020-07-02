<?php include_once(PLUGIN_DIR .  "includes/restricted/smwp_connect_db.php") ?>

<?php

function  smwpUpdatePerson() {

  global $connection; 
  global $affectation;
  global $tutelles;
  global $statuts;
  global $contrat;
  
    $fonction = isset($_POST['fonction']) ? $_POST['fonction']:'';
    $nom = isset($_POST['nom']) ? $_POST['nom']:'';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom']:'';
    $fonction = isset($_POST['fonction']) ? $_POST['fonction']:'';
    $affectation = isset($_POST['updatelabo'])? $_POST['updatelabo']: $affectation;
    $statuts = isset($_POST['updatestatuts']) ? $_POST['updatestatuts']:$statuts;
    $email = isset($_POST['email']) ? $_POST['email']:'';
    $ldap = isset($_POST['ldap']) ? $_POST['ldap']:'';
    $tutelles = isset($_POST['updatetutelles']) ? $_POST['updatetutelles']:$tutelles;
    $adresse = !empty($_POST['adresse']) ? $_POST['adresse']:1;
    $salle = isset($_POST['salle']) ? $_POST['salle']:'';
    $poste = isset($_POST['poste']) ? $_POST['poste']: NULL;
    $date_arrivee = isset($_POST['date_arrivee']) ? $_POST['date_arrivee']:'';
    $date_depart = isset($_POST['date_depart']) ? $_POST['date_depart']:'';
    $civilite = isset($_POST['civilite']) ? $_POST['civilite']: false;
    $contrat = isset($_POST['updatecontrat']) ? $_POST['updatecontrat']:$contrat;
    $page_perso = isset($_POST['page_perso']) ? $_POST['page_perso']:'';

    if(isset($_POST['update'])) {   

      $result = $connection->prepare('UPDATE annuaire SET nom = :nom, prenom = :prenom, statuts = :statuts, affectation = :affectation, tutelles = :tutelles, fonction = :fonction, poste = :poste, salle = :salle, date_arrivee = :date_arrivee, date_depart = :date_depart, civilite = :civilite, contrat = :contrat, adresse = :adresse, email = :email, page_perso = :page_perso, ldap = :ldap WHERE id = :id;');
      //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduites dans la bases de données -> empêche les injection SQL.
      $result->bindValue(':id', sanitize_text_field($_POST['id']), PDO::PARAM_INT);
      $result->bindValue(':nom', sanitize_text_field($nom), PDO::PARAM_STR);
      $result->bindValue(':prenom',sanitize_text_field($prenom), PDO::PARAM_STR);
      $result->bindValue(':statuts',sanitize_text_field($statuts), PDO::PARAM_STR);
      $result->bindValue(':affectation',sanitize_text_field($affectation), PDO::PARAM_STR);
      $result->bindValue(':tutelles',sanitize_text_field($tutelles), PDO::PARAM_STR);
      $result->bindValue(':fonction',sanitize_text_field($fonction), PDO::PARAM_STR);
      $result->bindValue(':poste', sanitize_text_field($poste), PDO::PARAM_STR);
      $result->bindValue(':salle', sanitize_text_field($salle), PDO::PARAM_STR);
      $result->bindValue(':date_arrivee',sanitize_text_field($date_arrivee), PDO::PARAM_STR);
      $result->bindValue(':date_depart',sanitize_text_field($date_depart), PDO::PARAM_STR);
      $result->bindValue(':civilite',sanitize_text_field($civilite), PDO::PARAM_STR);
      $result->bindValue(':contrat',sanitize_text_field($contrat), PDO::PARAM_STR);
      //récupère l'id associé à l'adresse sélectionnée.
      $result->bindValue(':adresse', sanitize_text_field($adresse), PDO::PARAM_STR);
      $result->bindValue(':email',sanitize_email($email), PDO::PARAM_STR);
      $result->bindValue(':page_perso',sanitize_text_field($page_perso), PDO::PARAM_STR);
      $result->bindValue(':ldap',sanitize_text_field($ldap), PDO::PARAM_STR);  

      $result->execute();

      $result = apply_filters('filter_smwpUpdatePerson', $result);
  }
}


//Mettre à jour les laboratoires
function smwpUpdateAddress() {
    
  if(isset($_POST['submit'])) {
    global $connection;

      $result = $connection->prepare("UPDATE adresses SET adresses.adresse = :newLocation WHERE adresses.id = :location;") or die(print_r($connection->errorInfo()));
      //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduites dans la bases de données -> empêche les injection SQL.
      $result->bindValue('location',sanitize_text_field($_POST['location']), PDO::PARAM_STR);
      $result->bindValue('newLocation',sanitize_text_field($_POST['new-location']), PDO::PARAM_STR);
      $result->execute();

       if ($result) {

        include(PLUGIN_DIR . "includes/views/infoUpdate.php");

        }
    }
 
}

//Mettre à jour les laboratoires
function smwpUpdateLabo() {
    
  if(isset($_POST['submit'])) {
    global $connection;
      
      $result = $connection->prepare("UPDATE annuaire SET affectation = :newAffectation WHERE affectation = :affectation;") or die(print_r($connection->errorInfo()));
      //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduiets dans la bases de données - empêche les injection SQL.
      $result->bindValue('affectation',sanitize_text_field($_POST['affectation']), PDO::PARAM_STR);
      $result->bindValue('newAffectation',sanitize_text_field($_POST['new-affectation']), PDO::PARAM_STR);
      $result->execute();
      

       if ($result) {
          include(PLUGIN_DIR . "includes/views/infoUpdate.php");


        }
    }
  }

