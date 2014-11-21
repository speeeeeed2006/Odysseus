<?php require_once 'header.php'; ?>

			<div id="wrap">

				<div id="produit">
					<h2>Catégorie > Marque > Produit</h2>

					<div id="photos">
						<img src="" alt="" class="">
						<img src="" alt="" class="vignette">
						<img src="" alt="" class="vignette"> 
					</div> <!--#photos-->

					<div id="details">
						<div id="gauche">	
							<span class="marque">Marque</span>
							<span class="nom_produit">Nom produit</span>
							<p class="descriptif">Description : </p>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
								eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.</p>
							<p>Voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
								adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam</p>
						</div><!--
						--><div id="droite">
							<span class="prix">159 €</span>
							<span class="prix barre">159 €</span>
							<div id="pourcentage"><span> -20%</span> </div>
							<span class="nb">(Nombre d'articles restants : 3)</span>
							<button type="button">Acheter</button>
						</div>
					</div> <!--#details-->

					<div id="complement">
						<div id="savoir">
							<span class="titre">En savoir plus</span>
							<p><span class="coloris">Coloris disponibles : </span> accusantium, doloremque,  laudantium</p>
							<p><span class="dimension">Dimensions :</span> 124x345cm</p> 
						</div><!--
						--><div id="avis">
							<span class="titre">Avis (2)</span>
							<p><span class="pseudo">Monsieur X</span><span class="note">4,5/5</span></p>
							<p class="commentaire">Tunde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore ratione voluptatem sequi nesciunt.</p>				
						</div>
						
					</div><!--#complement-->					
					
				</div> <!--#produit-->


			</div><!--#wrap -->
		 <?php require_once 'widgets.php'; ?>
		
<?php require_once 'footer.php'; ?>