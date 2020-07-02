<?php include PLUGIN_DIR . "includes/functions/smwp_function_add.php";?>
<?php include PLUGIN_DIR . "includes/functions/smwp_function_views.php";?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');

// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
$nav_active = 'add-person';
?>

<div class="container smwp_dir_admin">

  <div class="wrap">

  <?php
//menu de navigation
include PLUGIN_DIR . "includes/views/smwpNavigationView.php";
?>

    <div class="smwp-create-form">

      <form id="smwp-directory" action="#" method="post">

        <div class="top-form">

          <h3 class="smwp-form-title">Ajouter un membre du personnel</h3>
            <p class="intro-admin">Ce formulaire vous permet d'ajouter le profil d'une personne dans la base de données de l'annuaire.</p>

        </div>

          <p class="intro-admin"><em><i class="dashicons dashicons-warning"></i>Les champs <b>nom</b>, <b>prénom</b> et <b>email</b> sont le minimum requis pour pouvoir enregistrer le nouveau profil.</em></p>

          <div class="form-group left">

           <div class='form-group'>

            <span class='smwp-checkbox-form-mme'><input type='radio' name='civilite' value='Mme'>Mme </span>
            <span class='smwp-checkbox-form-m'><input type='radio' name='civilite' value='M.'>M.</span>

          </div>


          <div class="form-group left">

            <span class="dashicons dashicons-admin-users"></span>
            <label class="smwp_label" for="nom">Nom</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="nom" class="form-control" required placeholder="nom de famille - OBLIGATOIRE">

          </div>

          <div class="form-group right">

            <span class="dashicons dashicons-admin-users"></span>
            <label class="smwp_label" for="prenom">Prenom</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="prenom" class="form-control" required placeholder="prénom - OBLIGATOIRE">

          </div>

          <div class="form-group left">

            <span class="dashicons dashicons-nametag"></span>
            <label class="smwp_label" for="salle">Identifiant ent</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="ldap" class="form-control" placeholder="identifiant ENT">

          </div>

          <div class="form-group right">

            <span class="dashicons dashicons-portfolio"></span>
            <label class="smwp_label" for="fonction">Fonction(s)</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="fonction" class="form-control" placeholder="exemple : Directeur de laboratoire...">

          </div>

          <div class="form-group left">

           <span class="dashicons dashicons-groups"></span>
            <label class="smwp_label" for="tutelles">Tutelle</label>
            <select name="tutelles" class="smwp-select-affectation smwp-select-form smwp-add-form">
                  <?php smwpViewTutelles();?>
            </select>

          </div>

          <div class="form-group right">

            <span class="dashicons dashicons-tag"></span>
            <label class="smwp_label" for="statuts">Statut</label>
             <select name="statuts" class="smwp-select-affectation smwp-select-form smwp-add-form">
                  <?php smwpViewStatuts();?>
            </select>
            <br/>
          </div>

          <div class="form-group left">
              <span class="dashicons dashicons-networking"></span>
            <label class="smwp_label" for="affectation">Affectation</label>
            <br/>
            <select name="affectation" class="smwp-select-affectation smwp-select-form smwp-add-form">
                  <?php smwpViewAffectation();?>
            </select>
          </div>

          <div class="form-group right">
               <span class="dashicons dashicons-format-aside"></span>
            <label class="smwp_label" for="contrat">Contrat</label>
            <br/>
              <select name="contrat" class="smwp-select-affectation smwp-select-form smwp-add-form">
                  <?php smwpViewContrat();?>
            </select>
         </div>
        </div>

        <div class="form-group right">
            <div class="form-group smwp-adjust-form"> </div>

          <div class="form-group right">

            <span class="dashicons dashicons-email-alt"></span>
            <label class="smwp_label" for="email">Email</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="email" class="form-control" required placeholder="email - OBLIGATOIRE">

          </div>

          <div class="form-group left">

            <span class="dashicons dashicons-location-alt"></span>
            <label class="smwp_label" for="salle">Bureau</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="salle" class="form-control" placeholder="exemple : D 016, B-001...">

          </div>

          <div class="form-group left">

            <span class="dashicons dashicons-phone"></span>
            <label class="smwp_label" for="poste">Poste</label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="poste" class="form-control" placeholder="exemple : 02 98 49 88 87">

          </div>

          <div class="form-group right">

            <span class="dashicons dashicons-id"></span>
            <label class="smwp_label" for="salle">Page perso : </label>
            <br/>
            <input class="smwp_input smwp-select-form smwp-add-form" type="text" name="page_perso" class="form-control" placeholder="taper l'url de votre page perso ici">

          </div>

          <div class='form-group left'>

            <span class='dashicons'></span>
            <label class='smwp_label' for='date_arrivee'>Date d'arrivée</label>
            <br/>
            <input class='smwp_input smwp-select-form smwp-add-form' type='date' name='date_arrivee' class='form-control' value='$date_arrivee'>

          </div>

          <div class='form-group right'>

            <span class='dashicons '></span>
            <label class='smwp_label' for='date_depart'>Date de départ</label>
            <br/>
            <input class='smwp_input smwp-select-form smwp-add-form' type='date' name='date_depart' class='form-control'  value='$date_depart'>

          </div>

          <div class="form-group full">

            <span class="dashicons dashicons-location-alt"></span>
            <label class="smwp_label" for="adresse">Adresse</label>
            <br/>
            <select name="adresse" class="smwp-select-form">
                <?php smwpViewAddress();?>
            </select>

          </div>

        </div>

        <?php smwpAddPerson();?>
         <div class="form-group">
           <button class="btn btn-primary btn-admin" type="submit" name="submit" value="Ajouter à l'annuaire">Enregistrer</button>
         </div>
      </form>

    </div>

  </div>

</div>

