
<!--Vue des données d'un profil pour la page update-person.php quand on veut mettre à jour un profil-->

		<form id="smwp-directory" action='#' method='post'>

			<div class='update-data-form'>

				<div class='update-data-form-left'>

					<div class='form-group'>

						<span class='smwp-checkbox-form-mme'>

							<input type='radio' name='civilite' value='Mme'
						<?php
							if ($civilite == 'Mme'):
						?>
							checked='checked'
						<?php
							endif;
						?>
							>Mme </span>

						 <span class='smwp-checkbox-form-m'>

						 	<input type='radio' name='civilite' value='M.'
						<?php
						if ($civilite == 'M.'):
						?>
							checked='checked'
						<?php
						endif;
						?>

						>M. </span>

					</div>

					<div class='form-group left'>
						<span class='dashicons dashicons-admin-users'></span>
						<label class='smwp_label' for='nom'>Nom</label><br/>
						<input class='form-control smwp_input' type='text' name='nom' value='<?php echo $nom; ?>'/>
					</div>

					<div class='form-group left'>
						<span class='dashicons dashicons-admin-users'></span>
						<label class='smwp_label' for='prenom'>Prenom</label><br/>
						<input class='form-control smwp_input' type='text' name='prenom' value='<?php echo $prenom; ?>'>
					</div>

					<div class='form-group left'>
						<span class='dashicons dashicons-nametag'></span>
						<label class='smwp_label' for='ldap'>identifiant ent</label><br/>
						<input class='form-control smwp_input' type='text' name='ldap' value='<?php echo $ldap; ?>'>
					</div>


             		<div class='form-group left'>
        				<span class='dashicons dashicons-portfolio'></span>
              			<label class='smwp_label' for='fonction'>fonction(s)</label><br/>
              			<input class='form-control smwp_input' type='text' name='fonction' value='<?php echo $fonction; ?>'>
              		</div>

					<div class='form-group left'>
        				<span class='dashicons dashicons-format-aside'></span>
              			<label class='smwp_label' for='contrat'>contrat : <b><?php echo $contrat; ?></b></label><br/>
              			<input class='hidden' name='contrat' value='<?php echo $contrat; ?>'>
                  		<?php smwpViewContrat();?>
                  	</div>
              			
					<div class='form-group left'>
            			<span class='dashicons dashicons-tag'></span>
                  		<label class='smwp_label' for='statuts'>statut : <b><?php echo $statuts; ?></b></label>
                  		<input class='hidden' name='statuts' value='<?php echo $statuts; ?>'>
                  		<?php smwpViewStatuts();?>
                  	</div>

			        <div class='form-group left'>
						<span class='dashicons dashicons-networking'></span>
						<label class='smwp_label' for='affectation'>Affectation : <b><?php echo $affectation; ?></b></label>
						<input class='hidden' name='affectation' value='<?php echo $affectation; ?>'/>
						<?php
						smwpViewAffectation();
						?>


					</div>

					<div class='form-group left'>
			        	<span class='dashicons dashicons-groups'></span>
			            <label class='smwp_label' for='tutelles'>tutelle : <b><?php echo $tutelles; ?></b></label>

			            <input class='hidden' name='tutelles' value='<?php echo $tutelles; ?>'>
			            <?php smwpViewTutelles();?>
			        </div>
				</div>


				<div class='update-data-form-right'>

				<div class='form-group'><span class='smwp-checkbox-form-mme'></span></div>

					<div class='form-group left'>
			        	<span class='dashicons dashicons-phone'></span>
			            <label class='smwp_label' for='poste'>poste</label><br/>
			            <input class='form-control smwp_input' type='text' name='poste' value='<?php echo $poste; ?>'>
			        </div>

					<div class='form-group left'>
						<span class='dashicons dashicons-email-alt'></span>
						<label class='smwp_label' for='email'>email</label><br/>
						<input class='form-control smwp_input' type='text' name='email' value='<?php echo $email; ?>'>
					</div>

					<div class='form-group left'>
						<span class='dashicons dashicons-location-alt'></span>
						<label class='smwp_label' for='salle'>salle</label><br/>
						<input class='form-control smwp_input' type='text' name='salle' value='<?php echo $salle; ?>'>
					</div>

					<div class='form-group left'>
						<span class='dashicons dashicons-id-alt'></span>
						<label class='smwp_label' for='page_perso'>page perso</label><br/>
						<input class='form-control smwp_input' type='text' name='page_perso' value='<?php echo $page_perso; ?>' placeholder='page personnelle'>
					</div>

					<div class='form-group left'>
				        <span class='dashicons dashicons-calendar-alt'></span>
				        <label class='smwp_label' for='date_arrivee'>date d'arrivée</label><br/>
				        <input class='form-control smwp_input' type='date' name='date_arrivee' value='<?php echo $date_arrivee; ?>'>
			        </div>

					<div class='form-group left'>
						<span class='dashicons dashicons-calendar-alt'></span>
						<label class='smwp_label' for='date_depart'>date de départ</label><br/>
						<input class='form-control smwp_input' type='date' name='date_depart' value='<?php echo $date_depart; ?>'>
					</div>


					<div class='form-group full'>
						<span class='dashicons dashicons-location-alt'></span>

						<label class='smwp_label' for='salle'>adresse actuelle:</label>  <p><b><?php
$adresseEscaping = stripcslashes($adresse);
echo $adresseEscaping;
?></b></p>

		            <input class='form-control hidden' value='<?php echo $adresse; ?>' name='adresse'>
				   <?php echo smwpViewAddress(); ?>
	                </div>

	                <input class='btn btn-primary btn-admin' id='submit-update-member' type='submit' name='update' value='VALIDER LES MODIFICATIONS'>


					<div class='form-group hidden'>
						<input class='form-control' value='<?php echo $id; ?>' name='id' readonly>
					</div>
				</div>

			</div>

		</form>

