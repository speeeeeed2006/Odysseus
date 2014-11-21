<?php require_once 'header.php'; ?>

			<div id="wrap">

				<div id="haut">
					<div id="slider">
						<img src="http://lorempixel.com/970/380/nature/4/" alt="">
					</div>
					<div id="vignettes">
						<ul>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
				</div><!--#haut-->

				<div id="bas">
					<div id="a_la_une">
						<h2>Catégorie 1</h2>
						<div class="produit">
							<img src="http://lorempixel.com/250/140/nature/1/" alt="" />
							<span class="marque">Marque</span>
							<span class="nom_produit">Nom produit</span>
							<p class="descriptif">Lorem ipsum dolor sit amet, consectetur adipisicing elistrud ullamco, consectetur adipisicing elistrud ullamco.</p>
							<button type="button">Acheter</button>
							<span class="prix">159 €</span>
						</div><!-- fin .produit --><!--
					--><div class="produit">
							<img src="http://lorempixel.com/250/140/nature/2/" alt="" />
							<span class="marque">Marque</span>
							<span class="nom_produit">Nom produit</span>
							<p class="descriptif">Lorem ipsum dolor sit amet, consectetur adipisicing elistrud ullamco.</p>
							<button type="button">Acheter</button>
							<span class="prix">159 €</span>
						</div><!-- fin .produit -->
						<div id="plus_produits">
							<span><a href="" title="">Voir + de produits</a></span>
						</div> <!-- fin .#plus_produits -->
					</div><!--#a_la_une--><!--
				--><div id="nouveau">
						<h2>Nouveau</h2>
						<img src="http://lorempixel.com/250/140/nature/3/" alt="">
						<span class="marque">Marque</span>
						<span class="nom_produit">Nom produit</span>
						<p class="descriptif">Lorem ipsum dolor sit amet, consectetur adipisicing elistrud ullamco.</p>
						<button type="button">Acheter</button>	
						<span class="prix">159 €</span>
					</div><!-- fin #nouveau -->	
				</div> <!-- fin #bas -->

			</div><!--#wrap -->
		 <?php require_once 'widgets.php'; ?>
		
<?php require_once 'footer.php'; ?>