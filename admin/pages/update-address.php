<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_update.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_views.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
 $nav_active = 'update-address';
 ?>

<div class="container smwp_dir_admin">
    
  <div class="wrap">
    
  <?php 
  //menu de navigation
  include(PLUGIN_DIR . "includes/views/smwpNavigationView.php"); 
  ?>

    <!--FORMULAIRE DE MISE A JOUR-->
		<div class="smwp-create-form center-update-form">	 
              
      <form id="smwp-directory" action="#" method="post">


        <div class="top-form">
          
          <h3 class="smwp-form-title">Mise à jour d'une adresse</h3>
            <p class="intro-admin">Ce formulaire vous permet de mettre un jour les adresses enregistrées dans la base de données de l'annuaire. </p>

        </div>

        <p class="intro-admin"><em><i class="dashicons dashicons-warning"></i>Attention ! La mise à jour sera effective pour toutes les personnes affectées à cette adresse.</em></p>

        <p class="intro-admin">Si vous souhaitez modifier uniquement l'adresse d'une personne, veuillez utiliser le <br/> 
          <a href="<?php echo esc_url(admin_url() . 'admin.php?page=smwp_directory/admin/pages/update-person.php');?>">formulaire de mise à jour du personnel</a>
        </p>
                   
        <div class="form-group">
          
          <p class="smwp_label_first">Sélectionner l'adresse à modifier:</p>
          <select name="location" class="smwp-select-unity">
            <?php smwpViewAddress(); ?>
          </select>
                  
        </div>
                
        <div class="form-group">
          
          <p class="smwp_label_first">Adresse mise à jour: </p>
            <?php smwpUpdateAddress(); ?>
            
            <input type="text" name="new-location" class="form-control smwp_input smwp-select-form new-location" required>
    				
            <input class="btn btn-primary" type="submit" name="submit" value="CONFIRMER la modification"> 
        </div>

      </form>
    
    </div>

  </div>
  
</div>


  
              
       