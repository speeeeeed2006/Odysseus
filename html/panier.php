<?php require_once 'header.php'; ?>

			<div id="wrap">

				<h2>Récapitulatif de votre commande</h2>

				<div id="menu">
					<ul>
						<li class="etape">Résumé</li> 
						<li class="etape">Identifiez-vous</li>
						<li class="etape">Adresse</li>
						<li class="etape">Frais de port</li>
						<li class="etape">Paiement</li>
					</ul>
				</div>
				<div id="panier">
				<p>Votre panier contient :</p>

				<div class="table">
					<div class="row">
						<!-- <div class="cell head">Produit</div> -->
						<div class="cell head">Produit - Description</div>
						<div class="cell head">Référence</div>
						<div class="cell head">Prix unitaire</div>
						<div class="cell head">Quantité</div>
						<div class="cell head">Total</div>
						<div class="cell head">Supprimer</div>
					</div>
					<div class="row">
						<!-- <div class="cell">
							<img src="" alt="">
						</div> -->
						<div class="cell">Produit Capacité couleur Précision</div>
						<div class="cell">RC123456</div>
						<div class="cell">159,00</div>
						<div class="cell"></div>
						<div class="cell">159,00</div>
						<div class="cell">
							<form>
								 <input type="checkbox" name="nom" value="supprimer" />
							</form>
						</div>
					</div>
					<div class="row">
						<!-- <div class="cell">
							<img src="" alt="">
						</div> -->
						<div class="cell">Produit Capacité couleur Précision</div>
						<div class="cell">RC123456</div>
						<div class="cell">159,00</div>
						<div class="cell"></div>
						<div class="cell">159,00</div>
						<div class="cell">
							<form>
								 <input type="checkbox" name="nom" value="supprimer" />
							</form>
						</div>
					</div>

					<div class="row">
						<div class="cell">
							Total produit HT
							TVA (20,6%)
							Frais de port
							Total TTC 
						</div>
						<div class="cell">
							319,00
							0,00
							1,50
							320,5 
						</div>
					</div>
				</div>
				
					
					<button type="button" class="precedent continuer">Continuer mes achats</button>
					<button type="button" class="suivant">Suivant</button>
				</div><!--#panier-->
				<div id="infos">
					<span>Informations importantes</span>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
						inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.</p>
				</div> <!-- fin .#infos -->

			</div><!--#wrap -->
		 <?php require_once 'widgets.php'; ?>
		
<?php require_once 'footer.php'; ?>