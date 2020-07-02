
<!--Vue qui s'affiche sur la page directory.php pour voir l'annuaire-->
   
    <div class='smwp-card'>

        <div class='smwp-directory-row-1'>
        
            <div class='smwp-directory-row smwp-row-name column1'>
                <span class='dashicons dashicons-admin-users'></span>
                 <?php 
                echo $civilite ." ". $nom ." ". $prenom;
                ?>
                <br/>
                <?php
                    if ( $ldap != null ){  
                        echo " <i>( {$ldap} )</i>";
                    } else {  
                        echo "<i>( ENT non renseigné )</i>";
                    }
                ?>
 
            </div>

             <div class='smwp-directory-row'>
                <span class='dashicons dashicons-phone'></span> 
                  <?php echo $poste; ?> 
                <br/>
                <span class='dashicons dashicons-email-alt'></span> 
                   <?php echo $email ;?> 
            </div>
        
        <p class='hidden' name='id' ><?php echo $id; ?></p>

         <div class='smwp-directory-row'>
            <span class='dashicons dashicons-location-alt'></span> 
                 <?php echo $salle; ?>
                 <span> - </span>
                <?php 
                $adresseEscaping = stripcslashes($adresse);
                    echo $adresseEscaping;
                ?>
        </div>

    </div>

        <div class='smwp-directory-row-2'>

            <div class='smwp-directory-row column1'>
                <span class='dashicons dashicons-tag'></span> 
                    <?php echo $statuts; ?>
                    <span> - </span>
                    <?php
                    if ( $contrat != null ){       
                        echo 
                        "<span class='dashicons dashicons-format-aside'></span> 
                                {$contrat} - ";
                    } else {
                        echo "";
                    }
                    ?>
                
                <span class='dashicons dashicons-groups'></span> 
                    <?php echo $tutelles; ?>
                </div>

                <div class='smwp-directory-row'>
            <?php
            if ( $fonction != null ){  
                echo
                    "<span class='dashicons dashicons-portfolio'></span>
                        {$fonction} - ";
            } else {
                echo " ";
            }
            ?>
                <span class='dashicons dashicons-networking'></span>  
                    <?php echo $affectation; ?>
                </div>

                <div class='smwp-directory-row'>
                <?php 
                if ( $page_perso != null ){  
                ?>
                   <a href='<?php echo $page_perso; ?>'>
                        <span class='dashicons dashicons-id-alt'></span>
                            page perso
                    </a>
                <?php
                } else {
                    echo "";
                }
                ?>
        </div>
    </div>
</div>