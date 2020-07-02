<?php include_once(PLUGIN_DIR .  "includes/restricted/smwp_connect_db.php") ?>

<?php
function smwpSearchPerson() {
    
    global $connection;
  
  if( isset($_POST['searchId'] ) ) {

    global $affectation;
    global $adresse;
    global $statuts;
    global $tutelles;
    global $contrat;
  
    if ( !($_POST['searchENT'] ) && ( !$_POST['searchName'] ) && ( !$_POST['searchFirstname'] )) {

      include(PLUGIN_DIR . "includes/views/noResult.php");
    
    }

    else {   

    //RECHERCHE par identifiant ENT => 1 seul resultat possible   
      if ( ($_POST['searchENT'] ) ) {

      $result = $connection->prepare("SELECT annuaire.id AS id, nom, prenom, fonction, statuts, tutelles, affectation, poste, email, salle, ldap, civilite, date_arrivee, date_depart, contrat, page_perso, adresses.adresse AS adresse FROM annuaire INNER JOIN adresses ON annuaire.adresse = adresses.id WHERE LOWER(ldap)= :searchENT OR ldap = :searchENT;") or die(print_r($connection->errorInfo()));
        //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduiets dans la bases de données - empêche les injection SQL.
        $result->bindValue('searchENT', sanitize_text_field($_POST['searchENT']), PDO::PARAM_STR);
        $result->bindValue('ldap', sanitize_text_field($_POST['searchENT']), PDO::PARAM_STR);
        $result->execute();
        $count= $result->rowCount();

        if ($count == 0) {

            include(PLUGIN_DIR . "includes/views/noResult.php");

          }       

          else {

            echo "<p class='label-resultat'>Résultat de votre recherche</p>";

              while ($row = $result->fetch()) {
              
                  $id = $row['id'];
                  $nom = $row['nom'];
                  $prenom = $row['prenom'];
                  $statuts = $row['statuts'];
                  $affectation = $row['affectation'];
                  $tutelles = $row['tutelles'];
                  $fonction = $row['fonction'];
                  $poste = $row['poste'];
                  $salle = $row['salle'];
                  $date_arrivee = $row['date_arrivee'];
                  $date_depart = $row['date_depart'];
                  $contrat = $row['contrat'];
                  $adresse = $row['adresse'];
                  $civilite = $row['civilite'];
                  $email = $row['email'];
                  $page_perso = $row['page_perso'];
                  $ldap = $row['ldap'];

                $screen = get_current_screen();
                $screenid = $screen->id;

                    if ( $screenid == "smwp_directory/admin/pages/directory" ) {
                      include(PLUGIN_DIR . "includes/views/smwpListView.php");
                    }

                    else if( $screenid == "smwp_directory/admin/pages/update-person" ) {
                      include(PLUGIN_DIR . "includes/views/smwpDataPersonView.php");
                    }
                  
                    else {
                      
                      include(PLUGIN_DIR . "includes/views/smwpListDeleteView.php");
                    }

              }
          }           
      } 

//RECHERCHE avec le nom et le prénom 
      else if ( ( $_POST['searchName'] ) && ( $_POST['searchFirstname'] ) ) {

        $result = $connection->prepare("SELECT annuaire.id AS id, nom, prenom, fonction, statuts, tutelles, affectation, poste, email, salle, ldap, civilite, date_arrivee, date_depart, contrat, page_perso, adresses.adresse AS adresse FROM annuaire INNER JOIN adresses ON annuaire.adresse = adresses.id WHERE UPPER(nom)= :searchName AND prenom = :searchFirstname;") or die(print_r($connection->errorInfo()));
      //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduiets dans la bases de données - empêche les injection SQL.
        $result->bindValue('searchFirstname', sanitize_text_field($_POST['searchFirstname']), PDO::PARAM_STR);     
        $result->bindValue('searchName', sanitize_text_field($_POST['searchName']), PDO::PARAM_STR);
        $result->execute();
        $count = $result->rowCount();

          if ($count == 0) {
          //recherche que le nom
            $reqName = $connection->prepare("SELECT annuaire.id AS id, nom, prenom, fonction, statuts, tutelles, affectation, poste, email, salle, ldap, civilite, date_arrivee, date_depart, contrat, page_perso, adresses.adresse AS adresse FROM annuaire INNER JOIN adresses ON annuaire.adresse = adresses.id WHERE UPPER(nom)= :searchName") or die(print_r($connection->errorInfo()));
            //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduiets dans la bases de données - empêche les injection SQL.
            $reqName->bindValue('searchName', sanitize_text_field($_POST['searchName']), PDO::PARAM_STR);
            $reqName->execute();
            
            $countName = $reqName->rowCount();
          
          //si pas de nom trouvé 
            if ($countName == 0) {
              include(PLUGIN_DIR . "includes/views/noResult.php");
            
            //sinon on affiche une liste des personnes avec ce nom
            } else {

              echo "<p class='label-resultat'>Résultat de votre recherche</p>";

                while ($row = $reqName->fetch()) {
          
                    $id = $row['id'];
                    $nom = $row['nom'];
                    $prenom = $row['prenom'];
                    $statuts = $row['statuts'];
                    $affectation = $row['affectation'];
                    $tutelles = $row['tutelles'];
                    $fonction = $row['fonction'];
                    $poste = $row['poste'];
                    $salle = $row['salle'];
                    $date_arrivee = $row['date_arrivee'];
                    $date_depart = $row['date_depart'];
                    $contrat = $row['contrat'];
                    $adresse = $row['adresse'];
                    $civilite = $row['civilite'];
                    $email = $row['email'];
                    $page_perso = $row['page_perso'];
                    $ldap = $row['ldap'];

            //pour afficher une vue différente suivant la page de recherche
              $screen = get_current_screen();
              $screenid = $screen->id;

                  for ($i = 0; $i < count($nom); $i++) {
              //affiche la liste des personnes trouvées sur la page voir l'annuaire 
              //avec toutes les infos et un lien vers page de mise à jour
                    if ( $screenid == "smwp_directory/admin/pages/directory" ) {
                     
                      include(PLUGIN_DIR . "includes/views/smwpListView.php");
                }

                  else if( $screenid == "smwp_directory/admin/pages/update-person" ) {
                  //affiche la liste des personnes trouvées sur la page de mise à jour de profil 
                  // pour sélectionner la personne recherchée
                   
                    include(PLUGIN_DIR . "includes/views/smwpListView.php");
                }
        
                  else  {
                //A MODIFIER => faire une liste 
                    
                    include(PLUGIN_DIR . "includes/views/smwpListDeleteView.php");
                }
    
                  } 
            }
          }
          //si il y a une personne avec le nom et prénom recherché - affiche directement les données de cette personne
          } else {
   
            echo "<p class='label-resultat'>Résultat de votre recherche</p>";

          while ($row = $result->fetch()) {
          
                  $id = $row['id'];
                  $nom = $row['nom'];
                  $prenom = $row['prenom'];
                  $statuts = $row['statuts'];
                  $affectation = $row['affectation'];
                  $tutelles = $row['tutelles'];
                  $fonction = $row['fonction'];
                  $poste = $row['poste'];
                  $salle = $row['salle'];
                  $date_arrivee = $row['date_arrivee'];
                  $date_depart = $row['date_depart'];
                  $contrat = $row['contrat'];
                  $adresse = $row['adresse'];
                  $civilite = $row['civilite'];
                  $email = $row['email'];
                  $page_perso = $row['page_perso'];
                  $ldap = $row['ldap'];

//pour afficher une vue différente suivant la page de recherche
  $screen = get_current_screen();
  $screenid= $screen->id;

              //affiche la liste des personnes trouvées sur la page voir l'annuaire 
              //avec toutes les infos et un lien vers page de mise à jour
                if ( $screenid == "smwp_directory/admin/pages/directory" ) {
              include(PLUGIN_DIR . "includes/views/smwpListView.php");
            }

            else if( $screenid == "smwp_directory/admin/pages/update-person" ) {
              //affiche la liste des personnes trouvées
              include(PLUGIN_DIR . "includes/views/smwpDataPersonView.php");
            }
        
            else  {
              include(PLUGIN_DIR . "includes/views/smwpListDeleteView.php");
            }
              }         
        }
      }
     
      //RECHERCHE avec le nom de famille => plusieurs résultats possible 
      else if ( isset( $_POST['searchName'] ) ) {

        $reqNameStartWith = sanitize_text_field($_POST['searchName']);

        $result = $connection->prepare("SELECT annuaire.id AS id, nom, prenom, fonction, statuts, tutelles, affectation, poste, email, salle, ldap, civilite, date_arrivee, date_depart, contrat, page_perso, adresses.adresse AS adresse FROM annuaire INNER JOIN adresses ON annuaire.adresse = adresses.id WHERE UPPER(nom) LIKE '$reqNameStartWith%';") or die(print_r($connection->errorInfo()));
          //Nettoient les entrée en utilisant la liaison de paramètres avec PDO - Cela "échappe" les entrée étrangères avant qu'elles ne soient introduiets dans la bases de données - empêche les injection SQL.
          $result->bindValue('searchName', sanitize_text_field($_POST['searchName']), PDO::PARAM_STR);
        $result->execute();
        $count = $result->rowCount();

  //pas de nom trouvé
          if ($count == 0) {

            include(PLUGIN_DIR . "includes/views/noResult.php");

          }       

          else {

            echo "<p class='label-resultat'>Résultat de votre recherche</p>";
       
            while ($row = $result->fetch()) {
            
                    $id = $row['id'];
                    $nom = $row['nom'];
                    $prenom = $row['prenom'];
                    $statuts = $row['statuts'];
                    $affectation = $row['affectation'];
                    $tutelles = $row['tutelles'];
                    $fonction = $row['fonction'];
                    $poste = $row['poste'];
                    $salle = $row['salle'];
                    $date_arrivee = $row['date_arrivee'];
                    $date_depart = $row['date_depart'];
                    $contrat = $row['contrat'];
                    $adresse = $row['adresse'];
                    $civilite = $row['civilite'];
                    $email = $row['email'];
                    $page_perso = $row['page_perso'];
                    $ldap = $row['ldap'];

  $screen = get_current_screen();
  $screenid = $screen->id; 

              for ($i = 0; $i < count($nom); $i++) {

                if ( $screenid == "smwp_directory/admin/pages/directory" ) {
                  include(PLUGIN_DIR . "includes/views/smwpListView.php");
                }

                else if( $screenid == "smwp_directory/admin/pages/update-person" ) 
                {
                    if ($count > 1) {
                      include(PLUGIN_DIR . "includes/views/smwpListView.php");
                    } 

                    else {
                          include(PLUGIN_DIR . "includes/views/smwpDataPersonView.php");
                    } 
                }

                else {
                  include(PLUGIN_DIR . "includes/views/smwpListDeleteView.php");
                }

              } 
            }
          }
      }

    }
  }
}

