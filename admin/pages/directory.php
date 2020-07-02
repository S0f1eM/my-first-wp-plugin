<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_views.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_search.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
$nav_active = 'directory';
?>
  
<div class="container smwp_dir_admin">
      
  <div class="wrap">
     
      <?php 
      //menu de navigation
      include(PLUGIN_DIR . "includes/views/smwpNavigationView.php"); 
      ?>

  	  <div class="smwp-create-form form-view-all">
  		  
        <form id="smwp-directory" action="#" method="post">
  	     	
          <div class="top-form">
  	     		  <h3 class="smwp-form-title">Annuaire</h3>
                <p class="intro-admin intro-admin-update">Affiche les personnes enregistrées dans l'annuaire. Les champs vides ne sont pas affichés.</p>
          </div>

          <div class="search-form-smwp clearfix">
            
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
     
        </form>
             
  		  <div class="smwp-result-search">

            <!--recherche dans tout l'annuaire-->
            <?php smwpSearchPerson(); ?> 
            <!--affiche la totalité de l'annuaire-->
      		  <?php smwpViewAllDirectory(); ?>
            <!--affiche les données de la personne sélectionnée-->
            <?php smwpViewPersonData(); ?>

  		  </div>

  	  </div>
  				   
  	</div>
  
</div>
