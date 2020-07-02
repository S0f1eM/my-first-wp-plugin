<?php include_once(PLUGIN_DIR .  "includes/restricted/smwp_connect_db.php") ?>

<?php
/*
* Le fichier smwp_function_views.php regroupe les fonctions suivantes :
- smwpViewAllDirectory() => Affiche tout l'annuaire sur la page 'voir l'annuaire';
- smwpViewPersonData() => Affiche toutes les données du profil recherché/sélectionné pour les modifier.
- smwpViewAddress() =>Affiche la liste de toutes les adresses postales enregistrées dans l'annuaire.
*/


//afficher l'annuaire dans la page voir l'annuaire
function smwpViewAllDirectory() {
    global $connection;

    $result = $connection->prepare("SELECT annuaire.id AS id, nom, prenom, fonction, statuts, tutelles, affectation, contrat, poste, email, salle, ldap, civilite, date_arrivee, date_depart, page_perso, adresses.adresse AS adresse FROM annuaire INNER JOIN adresses ON annuaire.adresse = adresses.id WHERE NOT fonction='ABSENT' ORDER BY nom ASC") or die(print_r($connection->errorInfo()));
    $result->execute();
    
    if($result)
    {
        while ($row = $result->fetch()) {
//On récupère toutes les données que l'on place dans des variables pour les afficher. 
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
 // on affiche les données sur la page "voir l'annuaire"(admin/pages/directory.php) avec la "vue" smwpCardView.php qui se trouve dans le répertoire views.
                    for ($i = 0; $i < count($result); $i++) {
                        include(PLUGIN_DIR . "includes/views/smwpCardView.php");
                     }
                }

        }
    $result = apply_filters('filter_smwpViewAllDirectory', $result);
    }

}

//Affiche toutes les données du profil recherché/sélectionné pour les modifier
function smwpViewPersonData() {

    global $connection; 
    global $adresse;
    global $affectation;
    global $tutelles;
    global $statuts;
    global $contrat;

//Si le bouton pour modifier/afficher un profil est cliqué on active la requete 
    if( isset($_POST['showData']) ) {

        $result = $connection->prepare(" SELECT annuaire.id AS id, nom, prenom, fonction, statuts, tutelles, affectation, poste, email, salle, ldap, civilite, date_arrivee, date_depart, contrat, page_perso, adresses.adresse AS adresse FROM annuaire INNER JOIN adresses ON annuaire.adresse = adresses.id WHERE annuaire.id = :id;") or die(print_r($connection->errorInfo()));
        $result->bindValue('id',sanitize_text_field($_POST['id']), PDO::PARAM_STR);
        $result->execute();

        if (!$result) {

          include(PLUGIN_DIR . "includes/views/noResult.php");
          
        } else {

          while ($row = $result->fetch()) {
//On récupère toutes les données que l'on place dans des variables pour les afficher sur la page via la "vue" smwpDataPersonVIew.php qui se trouve dans le répertoire views.
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

            include(PLUGIN_DIR . "includes/views/smwpDataPersonView.php");

        }
      }
  }
}

//afficher les adresses enregistrées dans la table adresses liée par adresses.id à annuaire.adresse (id de l'adresse dans table annuaire)
function smwpViewAddress() {
    global $connection;
    global $adresse;
    global $id;

    $result = $connection->prepare("SELECT DISTINCT adresses.adresse AS adressetext, adresses.id AS adresseid FROM adresses INNER JOIN annuaire");
    $result->execute();

//récupère l'id des pages pour afficher un resultat/css différents suivant la page
    $screen = get_current_screen();
    $screenid = $screen->id;

//quand on est sur la page de mise un jour d'un profil (admin/pages/update-person.php)        
    if ( $screenid == "smwp_directory/admin/pages/update-person" ) {

        while ($row = $result->fetch()) {
            $adresseid = $row['adresseid'];
            $adressetext = $row['adressetext'];
            $adresseEscaping = stripcslashes($adressetext);

//Récupère le dernier ID de la table adresse pour l'input type number qui permet de sélectionner une adresse ligne 135
            $lastid = $connection->prepare('SELECT MAX(id) AS lastid FROM adresses');
            $lastid -> execute();
            $Number = $lastid -> fetch(PDO::FETCH_ASSOC);
            $maxNumber = $Number['lastid'];

//on focus sur l'adresse actuelle dans le profil lors de l'affichage des données d'un profil               
                if ($adressetext == $adresse ){
                    echo "
                    <input class='form-control adress-num' type='number' min='1' max='$maxNumber' name='adresse' value='$adresseid'/><option class='menu-option-adresse' value='$adresseid' selected='selected'>$adresseid -  $adresseEscaping</option> ";
                }  
//on affiche les autres adresses de la table adresses normalement                   
                else {
                        echo "<option class='menu-option-adresse' value='$adresseid' name='adresse'>$adresseid - $adresseEscaping</option>";           
                }
        } 

    }
//Si on est sur la page de création de profil ou celle de mise à jour de l'adresse on affiche simplement un menu déroulant pour sélectionner l'adresse
    else {

        while ($row = $result->fetch()) {

            $adresseid = $row['adresseid'];
            $adressetext = stripslashes($row['adressetext']);
               
        echo "<option value=$adresseid name='adresse'>$adresseid - $adressetext</option>";
        }
    }
}      



//afficher les affectations enregistrées dans l'annuaire
function smwpViewAffectation() {
    global $connection;
    global $affectation;
    global $id;

    $result = $connection->prepare("SELECT DISTINCT affectation FROM annuaire") or die(print_r($connection->errorInfo()));
    $result->execute();

    if($result) {

//récupère l'id des pages pour afficher un resultat/css différents suivant la page
        $screen = get_current_screen();
        $screenid = $screen->id;

//quand on est sur la page de mise un jour d'un profil (admin/pages/update-person.php)            
        if ( $screenid == "smwp_directory/admin/pages/update-person" ) {

            echo "<select class='smwp-select-unity form-control smwp_input' name='updatelabo'>";

            while ($row = $result->fetch()) {

            $labo = $row['affectation'];

//on focus sur l'affectation actuelle dans le profil lors de l'affichage des données d'un profil BUG => un coup oui un coup non...                           
                    if ($affectation == $labo) {
                        echo "<option value='$labo' selected='selected'>$labo</option>";    
                    } else {
//on affiche les autres affectations normalement                                           
                        echo "<option value='$labo'>$labo</option>
                        ";           
                    }
                } 
             echo "</select>";
//Si on est sur la page de création de profil ou celle de mise à jour de l'affectation on affiche simplement un menu déroulant pour sélectionner l'affectation
        }
         else {

            while ($row = $result->fetch()) {

            $labo = $row['affectation'];
                echo "<option value='$labo' >$labo</option>";
            }
        }
    }
}

function smwpViewTutelles() {
    global $connection;
    global $tutelles;
    global $id;


    $result = $connection->prepare("SELECT DISTINCT tutelles FROM annuaire WHERE tutelles IS NOT NULL;") or die(print_r($connection->errorInfo()));
    $result->execute();

    if($result) {

//récupère l'id des pages pour afficher un resultat/css différents suivant la page
        $screen = get_current_screen();
        $screenid = $screen->id;

//quand on est sur la page de mise un jour d'un profil (admin/pages/update-person.php)            
        if ( $screenid == "smwp_directory/admin/pages/update-person" ) {

            echo "<select class='smwp-select-unity form-control smwp_input' name='updatetutelles'>";

            while ($row = $result->fetch()) {

                $tut = $row['tutelles'];
           
//on focus sur la tutelle actuelle dans le profil lors de l'affichage des données d'un profil                         
                    if ($tut == $tutelles) {
                        echo "<option value='$tut' selected='selected'>$tut</option>";    
                    } else {
//on affiche les autres tutelles normalement                                           
                        echo "<option value='$tut'> $tut </option>";           
                    }
                } 
             
             echo "</select>";
//Si on est sur la page de création de profil ou celle de mise à jour de la tutelle on affiche simplement un menu déroulant pour sélectionner la tutelle
        }
         else {

            while ($row = $result->fetch()) {

            $tut = $row['tutelles'];

                echo "<option value='$tut' > $tut </option>";
            }
        }
    }
}

function smwpViewStatuts() {
    global $connection;
    global $statuts;
    global $id;

    $result = $connection->prepare("SELECT DISTINCT statuts FROM annuaire WHERE statuts IS NOT NULL") or die(print_r($connection->errorInfo()));
    $result->execute();

    if($result) {

//récupère l'id des pages pour afficher un resultat/css différents suivant la page
        $screen = get_current_screen();
        $screenid = $screen->id;

       //quand on est sur la page de mise un jour d'un profil (admin/pages/update-person.php)            
        if ( $screenid == "smwp_directory/admin/pages/update-person" ) {

            echo "<select class='smwp-select-unity form-control smwp_input' name='updatestatuts'>";

            while ($row = $result->fetch()) {

            $stat = $row['statuts'];

//on focus sur le statuts actuelle dans le profil lors de l'affichage des données d'un profil 
                if ($statuts == $stat) {
                    echo "<option value='$stat' selected='selected'>$stat</option>";    
                } else {
//on affiche les autres statuts normalement                                           
                    echo "<option value='$stat'>$stat</option>";           
                }
            } 

            echo "</select>";
//Si on est sur la page de création de profil ou celle de mise à jour de l'affectation on affiche simplement un menu déroulant pour sélectionner le statuts
        }
         else {

            while ($row = $result->fetch()) {

            $stat = $row['statuts'];
                echo "<option value='$stat' >$stat</option>";
            }
        }
    }
}


function smwpViewContrat() {
    global $connection;
    global $contrat;
    global $id;


    $result = $connection->prepare("SELECT DISTINCT contrat FROM annuaire WHERE contrat IS NOT NULL;") or die(print_r($connection->errorInfo()));
    $result->execute();
    
    if($result) {

//récupère l'id des pages pour afficher un resultat/css différents suivant la page
        $screen = get_current_screen();
        $screenid = $screen->id;

//quand on est sur la page de mise un jour d'un profil (admin/pages/update-person.php)            
        if ( $screenid == "smwp_directory/admin/pages/update-person" ) {

            echo "<select class='smwp-select-unity form-control smwp_input' name='updatecontrat'>";

            while ($row = $result->fetch()) {

                $listeContrat = $row['contrat'];
           
//on focus sur la tutelle actuelle dans le profil lors de l'affichage des données d'un profil                         
                    if ($listeContrat == $contrat) {
                        echo "<option value='$listeContrat' selected='selected'>$listeContrat</option>";    
                    } else {
//on affiche les autres tutelles normalement                                           
                        echo "<option value='$listeContrat'> $listeContrat </option>";           
                    }
                } 
             
             echo "</select>";
//Si on est sur la page de création de profil ou celle de mise à jour de la tutelle on affiche simplement un menu déroulant pour sélectionner la tutelle
        }
         else {

            while ($row = $result->fetch()) {

            $listeContrat = $row['contrat'];

                echo "<option value='$listeContrat' > $listeContrat </option>";
            }
        }
    }
}