/*----Apparition de la page de connexion----*/
$('.formConnexion').hide();
$(function(){
    $('.btnConnexion').click(function(){
        $('.btnConnexion').toggleClass('mr');
        $('.btnInscription').toggleClass('ml');
        $('.btn').toggleClass('positionA');
        $('.titreAccueil').toggleClass('transitionY');
        $('.slogan').toggleClass('transitionY');
        $('.btnConnexion').toggleClass('transition-Y');
        $('.btnInscription').toggleClass('transition-Y');
        $('.btnConnexion').hide();
        $('.btnInscription').hide();
        $('.formConnexion').fadeIn(1500);
        $('.formConnexion').toggleClass('transitionmin-Y');
    });
});
/*----Apparition de la page de Inscription----*/
$('.formInscription').hide();
$(function(){
    $('.btnInscription').click(function(){
        $('.btnConnexion').toggleClass('mr');
        $('.btnInscription').toggleClass('ml');
        $('.btn').toggleClass('positionA');
        $('.titreAccueil').toggleClass('transitionmin2-Y');
        $('.slogan').toggleClass('transitionmin2-Y');
        $('.btnConnexion').hide();
        $('.btnInscription').hide();
        $('.formInscription').fadeIn(1500);
        $('.formInscription').toggleClass('transitionmin-Y');
        
    });
});