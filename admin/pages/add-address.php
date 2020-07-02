<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_add.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_views.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
$nav_active = 'add-address'
;?>

<div class="container smwp_dir_admin">

	<div class="wrap">
    
  <?php 
  //menu de navigation
  include(PLUGIN_DIR . "includes/views/smwpNavigationView.php"); 
  ?>
   
    <div class="smwp-create-form add-form">

      <form id="smwp-directory" action="#" method="post">

        <div class="top-form">

				  <h3 class="smwp-form-title">Ajouter une adresse </h3>
            <p class="intro-admin">Ce formulaire vous permet d'ajouter une adresse dans la base de données de l'annuaire.</p>

			  </div>

        <div class="form-group">
          <p class="smwp_label_first"><label class="smwp_label" for="adresse">Liste des adresses enregistrée dans l'annuaire : </label>
          </p>
          <br/>

          <select name="adresse" class="smwp-select-unity">
            <?php smwpViewAddress();  ?>
          </select>
        </div>

        <div class="form-group">  
          <p class="smwp_label_first"><span class='dashicons dashicons-location-alt'></span>Nouvelle adresse à ajouter :</p>

          <input class='form-control smwp_input smwp-select-form new-location' type='text' name='adresse' class='form-control' required>
            <?php smwpAddAddress(); ?>  
        </div>

        <button class="btn btn-primary btn-admin" type="submit" name="submit" value="Ajouter à l'annuaire">Enregistrer</button>

      </form>
         
    </div>

  </div>         

</div>
