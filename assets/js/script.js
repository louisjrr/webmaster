/*----Apparition de la page de connexion----*/
$('.formConnexion').hide();
$(function(){
    $('.btnConnexion').click(function(){
        $('.titreAccueil').toggleClass('transitionY');
        $('.slogan').toggleClass('transitionY');
        $('.btnConnexion').toggleClass('transition-Y');
        $('.btnConnexion').hide();
        $('.formConnexion').fadeIn(1500);
        $('.formConnexion').addClass('transitionmin-Y');
    });
});
/*----Retour à l'accueil----*/
$(function(){
    $('.fas').click(function(){
        $('.formConnexion').hide();
        $('.btnConnexion').show();
        $('.btnConnexion').removeClass('transition-Y');
        $('.titreAccueil').removeClass('transitionY');
        $('.slogan').removeClass('transitionY');
        $('.titreAccueil').removeClass('transitionmin2-Y');
        $('.slogan').removeClass('transitionmin2-Y');
        $('.formConnexion').removeClass('transitionmin-Y');
    });
});
/*----Click sur le menu burger----*/
$(function(){
    $('.mobile').click(function(){
        $('.line1').toggleClass('mobileCrossP');
        $('.line2').toggleClass('mobileCrossM');
        $('.line3').toggleClass('d-none');
        $('.line1').toggleClass('marginT');
        $('.line2').toggleClass('marginO');
        $('.collapse').toggleClass('d-block')
    })
});
/*----Wishlist Add and Remove----*/
$(function(){
    $('.fa-heart').click(function(){
        $(this).toggleClass('far');
        $(this).toggleClass('fas');
        if($(this).hasClass("fas")){
            console.log('add to WishList')
        }else{
            console.log('remove of WishList')
        }
    })
})
/*----Wishlist Add and Remove----*/
$(function(){
    $('.stage').click(function(){
        const titre = $(this).find('.titre').html()
        const description = $(this).find('.description').html()
        const entreprise = $(this).find('.entreprise').html()
        $('.affichage').html("<h2>" + titre + "</h2><br><h4>Stage proposé par : "+ entreprise +"</h4><br><p>"+ description +"</p><br><br><h4>Merci d'ajouter ton CV et ta lettre de motivation ci-dessous :</h4><form method='POST'><input type='file' files multiple required><br><br><input type=submit>")
    })
})
/*----Bouton de retour en arrière----*/
$(function(){
    $('.btnBack').click(function(){
        window.history.back();
    })
});
/*----Submit de la recherche sur home.php----*/
$(function(){
    $('.recherche-icone').click(function(){
        $('.form-inline').submit()
    })
})
/*----Ajout d'une compétence dans offre de stage----*/
$(function(){
    $('.add').click(function(){
        if($('.allcompt').val()!=""){
            $('.listing').append($('.allcompt').val() + "; ")
            $('.allcompt').val("")
        }
    })
})
