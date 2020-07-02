
 
<?php
/*Vue du menu de navigation sous format d'onglet en haut de la page du contenu*/

$dashboard = esc_url('admin.php?page=smwp_directory/admin/pages/dashboard.php');
$addMember = esc_url('admin.php?page=smwp_directory/admin/pages/add-person.php');
$updateMember = esc_url('admin.php?page=smwp_directory/admin/pages/update-person.php');
$deleteMember = esc_url('admin.php?page=smwp_directory/admin/pages/delete-person.php');
$updateUnity = esc_url('admin.php?page=smwp_directory/admin/pages/update-labo.php');
$updateAddress = esc_url('admin.php?page=smwp_directory/admin/pages/update-address.php');
$addAddress = esc_url('admin.php?page=smwp_directory/admin/pages/add-address.php');
$showDirectory = esc_url('admin.php?page=smwp_directory/admin/pages/directory.php');

  
   echo "<h2 class='nav-tab-wrapper wp-clearfix'>
            
            <a href='$dashboard' class='nav-tab nav-options";
            	if ($nav_active == 'admin-page') {  echo " nav-tab-active";  } 
        	echo "'>Options</a>
            
            <a href='$addMember' class='nav-tab nav-add";
                if ($nav_active == 'add-person') {  echo " nav-tab-active";  } 
        	echo "'>Ajouter membre</a> 

            <a href='$updateMember' class='nav-tab nav-update-member";            	
                if ($nav_active == 'update-person') { 	echo " nav-tab-active";  } 
        	echo "'>Mettre à jour membre</a>

            <a href='$deleteMember' class='nav-tab nav-delete";            	
                if ($nav_active == 'delete-person') { 	echo " nav-tab-active";  } 
        	echo "'>Effacer un membre</a>
                  
            <a href='$updateUnity' class='nav-tab  nav-update-lab";           
             	if ($nav_active == 'update-labo') {  echo " nav-tab-active";  } 
        	echo "'>Mettre à jour une unité</a>

           <a href='$updateAddress' class='nav-tab nav-update-address";
            	if ($nav_active == 'update-address') { echo " nav-tab-active";  } 
        	echo "'>Mettre à jour une adresse</a>

            <a href='$addAddress' class='nav-tab nav-add-location";
            	if ($nav_active == 'add-address') {   echo " nav-tab-active";   } 
        	echo "'>Ajouter une adresse</a> ";                 

            echo "<a href='$showDirectory' class='nav-tab nav-see";
            	if ($nav_active == 'directory') {   echo " nav-tab-active";   }         	
        	echo "'>Voir l'annuaire</a>

        </h2>";


