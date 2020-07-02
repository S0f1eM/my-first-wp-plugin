<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_delete.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_views.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
 $nav_active = 'delete-address';
?>


<div class="container smwp_dir_admin">
    
  <div class="wrap">
     
    <?php 
    //menu de navigation
    include(PLUGIN_DIR . "includes/views/smwpNavigationView.php"); 
    ?>

	    <div class="smwp-create-form center-update-form">	 

        <form id="smwp-directory" action="#" method="post">

          <div class="top-form">
            
            <h3 class="smwp-form-title">Supprimer une adresse</h3>
              <p class="intro-admin">Ce formulaire vous permet de supprimer une adresse enregistrée dans la base de données de l'annuaire. </p>
          
          </div>

          <div class="form-group">
                        
            <p class="intro-admin"><em class="smwp-warning"><i class="dashicons dashicons-warning"></i>
                Attention ! La suppression sera effective pour toutes les personnes affectées à cette adresse.<br/>Cette opération remplacera l'adresse par un champs vide. Procédure recommandée au cas où une personne y serait encore affectée.</em></p>
                
            <p class="smwp_label_first">Sélectionner l'adresse à supprimer:</p>
	                    
            <select name="adresse" class="smwp-select-unity">
	            <?php smwpViewAddress(); ?>
            </select>

            <input class="btn btn-primary btn-admin" type="submit" name="submit" value="CONFIRMER la suppression">
            
          </div>
        
        </div>

      </form>

  </div>

</div>

