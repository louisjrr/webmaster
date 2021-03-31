$(function(){
    $('.notification').click(function(){
        const idNotif = $(this).find('.idNotification').html();
        $.post("notifVue",{idNotif : idNotif});
        console.log('okkkkk');
        window.location.reload(true);
        $(this).removeClass("alert-primary");
        $(this).addClass("alert-primary");
    })
})