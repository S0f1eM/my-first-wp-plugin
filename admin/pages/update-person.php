<?php include( PLUGIN_DIR . "includes/functions/smwp_function_search.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_views.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_update.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
 $nav_active = 'update-person';
?>

<div class="container smwp_dir_admin">
  
  <div class="wrap">
    	
  <?php 
  //menu de navigation
  include(PLUGIN_DIR . "includes/views/smwpNavigationView.php"); 
  ?>    	

	  <div class="smwp-create-form">
	    
      <form id="smwp-directory" action="#" method="post">
				
        <div class="top-form">
			     
          <h3 class="smwp-form-title">Mise à jour du personnel</h3> 
					
          <p class="intro-admin intro-admin-update">Ce formulaire vous permet de mettre un jour le profil d'une personne enregistrée dans la base de données de l'annuaire. <br/> Vous pouvez effectuer une recherche avec l'identifiant ENT ou avec le nom.</p>
				
        </div>

        <div class="search-form-smwp clearfix">

        		<p class="intro-admin"><em><i class="dashicons dashicons-warning"></i>Assurez vous de l'identité de la personne grâce à son identifiant ENT (identifiant unique) avant de valider les modifications.</em></p>
                                      
            <div class="left-search">
              
              <p class="smwp_label_first">Recherche avec identifiant ENT :</p>
              
              <input class="smwp-select-form smwp_input" type="text" name="searchENT" placeholder="Identifiant ENT" />  
            
            </div>
            
            <div class="middle-search">
              
              <p class="smwp_label_first">Recherche avec le nom :</p>
              
              <input class="smwp-search-form-smwp smwp_input" type="text" name="searchName" placeholder="Nom"/>
              
              <input class="smwp-search-form-smwp smwp_input"type="text" name="searchFirstname" placeholder="Prénom"/>    
            
            </div>
            
            <div class="right-search">
              
              <input class="btn btn-admin btn-primary searchBtn" id='submit-search-member' type="submit" name="searchId" value="Recherche">
            
            </div>

            
        </div>
        			
              <?php smwpSearchPerson(); ?>
        	
      </form>

        	<div class="search-result">
        		<?php smwpViewPersonData(); ?>
        		<?php smwpUpdatePerson();  ?>
        	</div>
                
    </div>
        		
  </div>
</div>

