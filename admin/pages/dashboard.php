<?php
// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
mb_internal_encoding('UTF-8');
 
// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
mb_http_output('UTF-8');
//raccourci pour le menu de navigation
 $nav_active = 'admin-page';
 ?>


<div class="container spwp_dir_admin">
	
	<div class="wrap">

     	<?php 
  		//menu de navigation
  		include(PLUGIN_DIR . "includes/views/spwpNavigationView.php"); 
  		?>
			
		<div class="spwp-create-form">

			<div class="top-form">
				<h3 class="spwp-form-title">Gestion de l'annuaire</h3>
					<p class="spwp_label_first"> Cet espace d'administration de l'annuaire vous permet d'effectuer les opérations suivantes sur l'annuaire de l'spwp :</p>
			</div>

			<div class="admin-page-directory">
							  
				<a class="btn-admin-page-directory btn-one" href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/add-person.php');?>">
					<p><span class="dashicons dashicons-admin-users dashicons-admin-page-directory"></span></p>
						
					<h4 class="title-btn-admin-page-directory">Ajouter une <br/>personne</h4>
				</a>
							  
				<a class="btn-admin-page-directory btn-one" href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/update-person.php');?>">
						
					<p><span class='dashicons dashicons-id-alt dashicons-admin-page-directory'></span></p>
					<h4 class="title-btn-admin-page-directory">Mettre à jour <br/>un profil</h4>
				</a>

				<a class="btn-admin-page-directory btn-one" href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/delete-person.php');?>">
					<p><span class='dashicons dashicons-trash dashicons-admin-page-directory'></span></p>
					<h4 class="title-btn-admin-page-directory">Supprimer <br/> un profil</h4>
				</a>	
							   
					
				<a class="btn-admin-page-directory btn-two" href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/update-labo.php');?>">
					<p><span class='dashicons dashicons-networking dashicons-admin-page-directory'></span></p>
					<h4 class="title-btn-admin-page-directory bug-btn-admin">Mettre à jour <br/>une unité</h4>
				</a>

				<a class="btn-admin-page-directory btn-two" href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/update-address.php');?>">
					<p><span class='dashicons dashicons-location-alt dashicons-admin-page-directory'></span></p>
					<h4 class="title-btn-admin-page-directory">Mettre à jour <br/>une adresse</h4>
				</a>
							  
				<a class="btn-admin-page-directory btn-two" href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/add-address.php');?>">
					<p><span class='dashicons dashicons-location-alt dashicons-admin-page-directory'></span></p>
					<h4 class="title-btn-admin-page-directory">Ajouter <br/>une adresse</h4>
				</a>

				<a class="btn-admin-page-directory btn-three"  href="<?php echo esc_url(admin_url() . 'admin.php?page=spwp_directory/admin/pages/directory.php');?>">
					<p><span class='dashicons dashicons-list-view  dashicons-admin-page-directory'></span></p>
					<h4 class="title-btn-admin-page-directory">Voir <br/>l'annuaire</h4>
				</a>
				 
				
			</div>

			<div class="admin-page-options">
				
				<div class="extra-info-options"> 	
				  	
				  	<!--<p class="intro-admin"><b>Pourquoi les options suivantes ne sont pas disponibles ?</b></p>-->

				    <p><em><b>Ajouter une unité</b></em> : En créant un nouveau profil de membre avec une nouvelle unité, vous allez créer automatiquement une nouvelle affectation qui sera alors visible dans les menus associés.</p>


				    <!--<p><em><b>Supprimer une unité</b></em> : Avant de supprimer une unité il faut s’assurer que plus personne n’y est affecté sinon cela créé une affectation vide dans la liste des affectations. Par mesure de propreté de la base de données, j’ai opté pour l’option de ne pas permettre cette action via l’outils.</p>

				    <p><em><b>Supprimer une adresse</b></em> : Supprimer une adresse encore assignée à une personne ne pouvait se faire sans une réassignation obligatoire d'une adresse valide (plus précisément d'une id) avant la suppression. Sans réassignation, le champs n'est plus valide et le profil de la personne n'est plus visible en ligne. 
				    Cela aurait amené à affecter une mauvaise adresse (par défaut) à certaines personnes sans savoir qui. Pour la justesse des informations, j’ai opté pour l’option de ne pas permettre cette action via l’outils.</p>-->

	 		    </div>
	 		    <div class="info-dashboard">
					<p class="intro-admin">
						<em>
							<i class="dashicons dashicons-warning"></i>
						 	<?php 
							$assistance = antispambot("assistance.spwp@univ-brest.fr");
							?>	
		
				  	Pour supprimer le nom d’une unité ou une adresse postale : Faire un <a href="mailto: <?php echo $assistance; ?>" title="assistance">ticket à l'assistance.</a>
				  	    </em>
				  	</p>
				</div>

	 		</div>
		</div>
	 </div>
</div>
