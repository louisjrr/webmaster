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
            $titre = $(this).parent().find('.titre').html();
            $description = $(this).parent().find('.description').html();
            $entreprise = $(this).parent().find('.entreprise').html();
            $.post("Add",{titre : $titre,description : $description,entreprise : $entreprise});
        }else{
            $titre = $(this).parent().find('.titre').html();
            $description = $(this).parent().find('.description').html();
            $entreprise = $(this).parent().find('.entreprise').html();
            $.post("Remove",{titre : $titre,description : $description,entreprise : $entreprise});
        }
    })
})
/*----Affichage complet du stage----*/ 
$(function(){
    $('.stage').click(function(){
        const titre = $(this).find('.titre').html()
        const description = $(this).find('.description').html()
        const entreprise = $(this).find('.entreprise').html()
        $('.affichage').html("<h2>" + titre + "</h2><br><h4>Stage proposé par : "+ entreprise +"</h4><br><p>"+ description +"</p><br><br><h4>Merci d'ajouter ton CV et ta lettre de motivation ci-dessous :</h4><label>Mon CV :</label><input type='file' name='cv' required><label>Ma lettre de Motivation :</label><input type='file' name='motiv' required><input class='sub_postulate' type=submit>")
    })
})
/*----Post des valeur de l'offre de stage----A MODIFIER*/
$(function(){
    $('.sub_postulate').click(function(){
        alert('coucou')
        $titre = $('.affichage').find('.titre').html()
        $description = $('.affichage').find('.description').html()
        $entreprise = $('.affichage').find('.entreprise').html()
        $.post("Postulate",{titre : $titre,description : $description,entreprise : $entreprise});
    })
});
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
/*----affichage des permissions dans register----*/

$(function(){
    $('.block').hide();
    $('#permission').change(function(){
        if($('#permission').val() == "delegate"){
            $('.block').show();
        }
        else{
            $('.block').hide();
        }
    });
    
});
/*----Affichage complet de l'entreprise----*/ 
$(function(){
    $('.entreprise').click(function(){
        const entreprise = $(this).find('.nom_entreprise').html()
        $('.affichage_entreprise').html("<h2>" + entreprise + "</h2><div class='rating'><a href='#5' title='Donner 5 étoiles'>☆</a><a href='#4' title='Donner 4 étoiles'>☆</a><a href='#3' title='Donner 3 étoiles'>☆</a><a href='#2' title='Donner 2 étoiles'>☆</a><a href='#1' title='Donner 1 étoile'>☆</a></div><input class='rate' type=submit>")
    })
})
/*----Modifier user----*/
$(function(){
    $('.fa-user-edit').click(function(){

    })
})
/*----supprimer user----*/
$(function(){
    $('.fas').click(function(){
        $(this).toggleClass('fa-eye');
        $(this).toggleClass('fa-eye-slash');
        $nom = $(this).parent().parent().find('.divNom').find('.nom').html()
        $prenom = $(this).parent().parent().find('.divPrenom').find('.prenom').html()
        $age = $(this).parent().parent().find('.divAge').find('.age').html()
        if ($(this).hasClass('fa-eye-slash')){
            $.post("Unvisible",{nom : $nom, prenom : $prenom, age : $age});
        }else{
            $.post("Visible",{nom : $nom, prenom : $prenom, age : $age});
        }
    })
})
