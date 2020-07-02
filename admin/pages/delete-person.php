<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_search.php"); ?>
<?php include( PLUGIN_DIR .  "includes/functions/smwp_function_delete.php"); ?>

<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
$nav_active = 'delete-person';
?>

<div class="container smwp_dir_admin">
    
    <div class="wrap">
  
        <?php 
        //menu de navigation
        include(PLUGIN_DIR . "includes/views/smwpNavigationView.php"); 
        ?>
    	
        <div class="smwp-create-form delete-form">
    	        
            <?php 
            $url = plugin_dir_url( 'delete-person.php' );
            ?>

            <form id="smwp-directory" action="<?php $url ?>" method="post">
    			
                <div class="top-form">
    				<h3 class="smwp-form-title">Effacer un membre du personnel</h3> 
    				    <p class="intro-admin">Ce formulaire vous permet de supprimer le profil d'une personne enregistrée dans la base de données de l'annuaire.</p>                       
    			</div>

                     
                <div class="search-form-smwp clearfix">


                     <p class="intro-admin"><em class="smwp-warning"><i class="dashicons dashicons-warning"></i>Assurez vous bien de l'identité de la personne avant de supprimer le profil. <br/> Il n'y a pas de retour en arrière possible, il vous faudra recréer le profil en cas d'erreur.</em></p>
                      
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
                <?php smwpDeletePerson(); ?>

            </form>
         
         </div> 

    </div>
		
</div>



