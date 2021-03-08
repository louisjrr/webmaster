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
/*----Retour à l'acceuil----*/
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
    })
})