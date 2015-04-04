$(document).ready(function(){
    $('#coin-slider').coinslider({ width: 970, height:380, delay: 5000, effect:'straight' });

    $("#select_form #categorieAjax").on('change', function() {
        var val = $(this).val();
        if (val != '') {
            $.ajax({
                type: 'get',
                url: Routing.generate('odysseus_ajax_Sous_categorie', {categorie: val})
            }).done(function (data) {
                $("#SousCategorieAjax").html(data);
            });
        }
    });

    $("#select_form #SousCategorieAjax").on('change', function() {
        var categorie = $("#select_form #categorieAjax").val();
        var val = $(this).val();
        if (val != '') {
            $.ajax({
                type: 'get',
                url: Routing.generate('odysseus_ajax_profil_marque', {  categorie       :   categorie,
                                                                        sousCategorie   :   val})
            }).done(function (data) {
                $("#marqueAjax").html(data);
            });
        }
    });
});

function AjaxProduitRecherche(categorie,sousCategorie,marque) {
    var categorie       = $("#select_form #categorieAjax").val();
    var sousCategorie   = $("#select_form #SousCategorieAjax").val();
    var marque          = $("#select_form #marqueAjax").val();

    $.ajax({
        type: 'get',
        url: Routing.generate('odysseus_ajax_profil_produit', { categorie       :   categorie,
                                                                sousCategorie   :   sousCategorie,
                                                                marque          :   marque})
        }).done(function( data ) {
        $("div #produit_recherche").html(data);
    });
};

