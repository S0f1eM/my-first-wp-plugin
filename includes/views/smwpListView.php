
<!--Vue en liste des résultats d'une recherche sur la page voir l'annuaire (directory.php) ou pour mettre à jour un profil (update-person.php)-->

     
<?php 
$url = esc_url(admin_url() . 'admin.php?page=smwp_directory/admin/pages/update-person.php');
?>


<form id="smwp-directory" action='<?php echo $url; ?>' method='post'>
    <div class='smwp-card list-update-card'>

        <div class='smwp-directory-row-1'>
        
            <div class='smwp-directory-row smwp-row-name column1 result-name'>
                <span class='dashicons dashicons-admin-users'></span>
                <?php
                  echo $civilite ." ". $nom ." ". $prenom;
                ?>
                 <br/>
                <?php
                    if( $ldap != null ){  
                        echo " <i>( {$ldap} )</i>";
                    } else {  
                        echo "<i>( ENT non renseigné )</i>";
                    }
                ?>
            </div>

             <div class='smwp-directory-row'>
                <span class='dashicons dashicons-phone'></span> 
                <?php echo $poste ?> <br/>
                <span class='dashicons dashicons-email-alt'></span> 
                <?php echo $email ?>
            </div>
        

        <p class='hidden' name='id' ><?php echo $id ?></p>

         <div class='smwp-directory-row'>
          
	       <input class='btn btn-primary btn-select-member' id='submit-show-data-member' type='submit' name='showData' value='MODIFIER'>

        </div>

    </div>

        <div class='smwp-directory-row-2'>

            <div class='smwp-directory-row column1'>
                    <span class='dashicons dashicons-tag'></span> 
                    <?php echo $statuts; ?>
                    <span> - </span>
                    <?php
                     if ( $contrat != null ){  
                    ?>        
                        <span class='dashicons dashicons-format-aside'></span> 
                    <?php echo $contrat;  ?>
                    <span> - </span>
                    <?php
                        } else {
                            echo "";
                        } 
                    ?>
                        <span class='dashicons dashicons-groups'></span> 
                        <?php echo $tutelles ?>
                </div>

                <div class='smwp-directory-row'>
            <?php     
            if ( $fonction != null ){  
            ?>
                <span class='dashicons dashicons-portfolio'></span>
                <?php echo $fonction;  ?>
                <span> - </span>
                    <?php
            } else {
                echo " ";
            }
            ?>
                <span class='dashicons dashicons-networking'></span>  
            <?php echo $affectation ?>
            </div>

                <div class='smwp-directory-row'>

					<input class='smwp_input hidden' type='text' name='id' readonly value='<?php echo $id; ?>'>
				</div>
        </div>
    </div>
</form>
