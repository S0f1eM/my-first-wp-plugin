<?php 
include_once(PLUGIN_DIR .  "includes/restricted/smwp_connect_db.php") 
?>


<?php
/*
* Le fichier smwp_function_add.php regroupe les 3 fonctions suivantes :
- smwpAddPerson(); => Ajouter un nouveau profil
- smwpAddAddress(); => AJouter une nouvelle adresse
- smwpAddLabo(); => AJouter un nouveau nom d'unité/labo
*/



function smwpAddPerson() {
/**
 * Ajoute une nouvelle personne dans la base de données mysql de l'annuaire.
*/
    global $connection;


    if(isset($_POST['submit'])) {

    $civilite = isset($_POST['civilite']) ? $_POST['civilite']: NULL;
    $fonction = isset($_POST['fonction']) ? $_POST['fonction']:'';
    $nom = isset($_POST['nom']) ? $_POST['nom']:'';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom']:'';
    $fonction = isset($_POST['fonction']) ? $_POST['fonction']:'';
    $affectation = isset($_POST['affectation'])?$_POST['affectation']:'';
    $statuts = isset($_POST['statuts']) ? $_POST['statuts']:'';
    $email = isset($_POST['email']) ? $_POST['email']:'';
    $ldap = isset($_POST['ldap']) ? $_POST['ldap']:'';
    $tutelles = isset($_POST['tutelles']) ? $_POST['tutelles']:'';
    $adresse = !empty($_POST['adresse']) ? $_POST['adresse']: 1;
    $salle = isset($_POST['salle']) ? $_POST['salle']:'';
    $poste = isset($_POST['poste']) ? $_POST['poste']: NULL;
    $date_arrivee = isset($_POST['date_arrivee']) ? $_POST['date_arrivee']:'';
    $date_depart = isset($_POST['date_depart']) ? $_POST['date_depart']:'';
    $civilite = isset($_POST['civilite']) ? $_POST['civilite']: false;
    $contrat = isset($_POST['contrat']) ? $_POST['contrat']:'';
    $page_perso = isset($_POST['page_perso']) ? $_POST['page_perso']:'';

    
    $result = $connection->prepare("INSERT INTO annuaire (nom, prenom, statuts, affectation, tutelles, fonction, poste, salle, date_arrivee, date_depart, contrat, adresse, civilite, email, page_perso, ldap) VALUES ( :nom, :prenom, :statuts, :affectation, :tutelles, :fonction, :poste, :salle, :date_arrivee, :date_depart, :contrat, :adresse, :civilite, :email, :page_perso, :ldap)") or die(print_r($connection->errorInfo()));
    

         $result->bindValue('nom', sanitize_text_field($nom), PDO::PARAM_STR);
         $result->bindValue('prenom',sanitize_text_field($prenom), PDO::PARAM_STR);
         $result->bindValue('statuts',sanitize_text_field($_POST['statuts']), PDO::PARAM_STR);
         $result->bindValue('affectation',sanitize_text_field($_POST['affectation']), PDO::PARAM_STR);
         $result->bindValue('tutelles',sanitize_text_field($_POST['tutelles']), PDO::PARAM_STR);
         $result->bindValue('fonction',sanitize_text_field($_POST['fonction']), PDO::PARAM_STR);
         $result->bindValue('poste', sanitize_text_field($_POST['poste']), PDO::PARAM_STR);
         $result->bindValue('salle', sanitize_text_field($_POST['salle']), PDO::PARAM_STR);
         $result->bindValue('date_arrivee',sanitize_text_field($_POST['date_arrivee']), PDO::PARAM_STR);
         $result->bindValue('date_depart',sanitize_text_field($_POST['date_depart']), PDO::PARAM_STR);
         $result->bindValue('contrat',sanitize_text_field($_POST['contrat']), PDO::PARAM_STR);
         $result->bindValue('adresse', sanitize_text_field($_POST['adresse']), PDO::PARAM_STR);
         $result->bindValue('civilite',sanitize_text_field($civilite), PDO::PARAM_STR);
         $result->bindValue('email',sanitize_email($_POST['email']), PDO::PARAM_STR);
         $result->bindValue('page_perso',sanitize_text_field($_POST['page_perso']), PDO::PARAM_STR);
         $result->bindValue('ldap',sanitize_text_field($_POST['ldap']), PDO::PARAM_STR);
         $result->execute();

        if ($result && $connection) {

              include(PLUGIN_DIR . "includes/views/infoUpdate.php");

        } else if ($connection->errorInfo()) {

             echo "<div id='setting-error-settings_updated' class='update-nag'> 
                    <p>
                        <strong>
                        Une erreur est survenue durant la mise à jour. Veuillez réessayer ou contacter un administrateur informatique.
                        </strong>
                    </p>
                  </div>
                ";
        }
        $result = apply_filters('filter_smwpAddPerson', $result);
    }
}


//Ajouter une nouvelle adresse postale dans l'annuaire
function smwpAddAddress() {
    global $connection;

   $searchId = $connection->query("SELECT DISTINCT adresse, id FROM adresses") or die(print_r($connection->errorInfo()));

     while ($row = $searchId->fetch()) {
        $id = $row['id'];
        $adresse = $row['adresse'];
        $newId = $id + 1;
    }

      echo "
            <div class='form-group hidden'>
              <label class='smwp_label' for='id'>id</label><br/>
              <input class='smwp_input' type='text' name='id' class='form-control' value='{$newId}' readonly>
            </div>
       ";

  if(isset($_POST['submit'])) {
    
    $result = $connection->prepare("INSERT INTO adresses(adresse, id) VALUES (:adresse, :id) ") or die(print_r($connection->errorInfo()));

         $result->bindValue('id', sanitize_text_field($_POST['id']), PDO::PARAM_INT);
         $result->bindValue('adresse', sanitize_text_field($_POST['adresse']), PDO::PARAM_STR);
         $result->execute();

         if($result) {
       include(PLUGIN_DIR . "includes/views/infoUpdate.php");
        }
      }
    }


//Ajouter une nouvelle unité dans l'annuaire
function smwpAddLabo() {

  if(isset($_POST['submit'])) {
    
    global $connection; 

      $result = $connection->prepare("INSERT INTO annuaire (affectation) VALUES ('$addAffectation')");
      $result->execute();

      $addAffectation = sanitize_text_field($_POST['affectation']);

    if (!$result) {

         die("Database connection failed " . $connection->getMessage());

    } else {
          
         include(PLUGIN_DIR . "includes/views/infoUpdate.php");

        }

    }

  }


?>