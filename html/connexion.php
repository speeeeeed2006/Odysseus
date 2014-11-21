<?php require_once 'header.php'; ?>

			<div id="wrap">

				<div id="identification">
					<h2>Identifiez-vous</h2>
					<div class="fond">
						<span class="sous-titre">Déja inscrit</span>
						<form method="" action="" id="identifier">
							<p><label for="identifiant">Identifiant</label><input type="text" name="identifiant" id="identifiant" placeholder="Votre email"/></p>
							<p><label for="mdp">Mot de passe</label><input type="text" name="mdp" id="mdp" placeholder="Votre mot de passe"/></p>
							<button type="submit">Valider</button>
						</form>
					</div> <!-- .fond -->
				</div> <!--#identification-->

				<div id="creation">
					<h2>Créez votre compte</h2>
					<div class="fond">
						<span class="sous-titre">Nouvelle inscription</span>
						<form method="" action="" id="creer">
							<p><label for="">Civilité</label>
							<input type="radio" name="civilite" value="femme"/>Madame
							<input type="radio" name="civilite" value="homme"/> Monsieur</p>
							<p><label for="prenom">Prénom *</label><input type="text" name="prenom" id="prenom" placeholder="Votre prénom"/></p>
							<p><label for="nom">Nom *</label><input type="text" name="nom" id="nom" placeholder="Votre nom"/></p>
							<p><label for="adresse1">Adresse 1</label><input type="text" name="adresse1" id="adresse1" placeholder="Votre adresse"/></p>
							<p><label for="adresse2">Adresse 2</label><input type="text" name="adresse2" id="adresse2" placeholder="Complément à votre adresse"/></p>
							<p><label for="cp">Code postal</label><input type="text" name="cp" id="cp" placeholder="Votre code postal"/></p>
							<p><label for="ville">Ville</label><input type="text" name="ville" id="ville" placeholder="Ville"/></p>
							<p><label for="email">E-mail *</label><input type="text" name="email" id="email" placeholder="E-mail"/></p>
							<p><label for="tel">Téléphone</label><input type="text" name="tel" id="tel" placeholder="Téléphone" /></p>
							<p><label for="mdp">Mot de passe *</label><input type="text" name="mdp" id="mdp" placeholder="Mot de passe" /></p>
							<span class="note">(* champs obligatoires)</span>
							<button type="submit">Valider</button>
						</form>
					</div> <!-- .fond -->
				</div> <!-- #creation -->

				<div id="infos">
					<span>Informations importantes</span>
					<p>Votre email servira d'identification.</p>
				</div> <!-- fin .#infos -->

			</div><!--#wrap -->
		 <?php require_once 'widgets.php'; ?>
		
<?php require_once 'footer.php'; ?>