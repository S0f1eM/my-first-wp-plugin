<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_delete.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_views.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
 $nav_active = 'delete-labo';
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
            
            <h3 class="smwp-form-title">Supprimer un nom d'unité</h3>
              <p class="intro-admin">Ce formulaire vous permet de supprimer le nom d'une unité ou un laboratoire enregistrés dans la base de données de l'annuaire. </p>
          
          </div>

          <div class="form-group">
                        
            <p class="intro-admin"><em class="smwp-warning"><i class="dashicons dashicons-warning"></i>Attention aux erreurs de manipulation ! La suppression sera effective pour toutes les personnes affectées à cette unité. <br/>Par conséquent, si il reste des personnes affectées à cette unité lors de sa suppression, le champ d'affectation des personnes concernées deviendra vide.</em></p>
            
            <p class="smwp_label_first">Sélectionner l'unité à supprimer:</p>
	                    
            <select name="affectation" class="smwp-select-unity">
	            <?php smwpViewAffectation(); ?>
            </select>

            <p class="intro-admin">Cette opération remplacera l'affectation par un champs vide. Procédure recommandée au cas où une personne y serait encore affectée:</p>

            <input class="btn btn-primary btn-admin" type="submit" name="submit" value="CONFIRMER la suppression">
            <hr/>
                       
            <p class="intro-admin">
              <em class="smwp-warning"><i class="dashicons dashicons-warning"></i>Si vous êtes certain que cette affectation n'est plus attribuée, vous pouvez supprimer définitivement le champs (row) de l'affectation dans la base de données : </em>
            </p>

            <input class="btn btn-danger btn-primary btn-delete" type="submit" name="delete" value="SUPPRIMER DE LA BASE" onClick="<?php echo esc_js(confirm('Confirmer la suppression?')); ?>">
                       <?php smwpDeleteLab(); ?> 
               
          </div>
        
        </div>

      </form>

  </div>

</div>

