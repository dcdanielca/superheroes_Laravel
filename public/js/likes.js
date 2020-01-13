// Revisa me gusta y no me gusta guardados y cambia su estado a activo (cambio de color en botón)
$(document).ready(function(){
    $('.btn-outline-dark').each(function(){
        if(localStorage.getItem($(this).attr('class').split(' ')[0] + 'superhero' + $(this).attr('id'))){
            $(this).addClass("active");
        }   
    })
})

// Proceso de dar click a botón me gusta o no me gusta
$(document).ready(function(){
$('.btn-outline-dark').click(function(){
    var id = $(this).attr('id');

    // la variable like va a indicar en controlador en Laravel si debo o no incrementar likes
    if ($(this).hasClass("active") && $(this).hasClass("like")){ // si se clickea botón me gusta que ya estaba activo
        var like = "no";
    }else if($(this).hasClass("active") && $(this).hasClass("dislike")){  // si se clickea botón no me gusta que ya estaba activo
        var like = "yes";
    } else if($(this).hasClass("dislike")){ // si se clickea botón no me gusta inactivo
        var like = "no";
    } else if($(this).hasClass("like")){ // si se clickea botón me gusta inactivo
        var like = "yes";
    }

    // Petición a Laravel para incrementar o decrementar likes
    $.ajax({ 
        url: '/superhero/like/',
        data: {"id": id, "like": like},
        type: 'post',
        success: json => {
            if ($(this).hasClass("active")){ // si el botón esta activo: desactivar y eliminar la clave en localStorage 
                $(this).removeClass("active")
                localStorage.removeItem($(this).attr('class').split(' ')[0] + 'superhero' + $(this).attr('id'));
            } else {  // si el botón esta inactivo: desactivar todos los botones, activar boton clickeado  y agregar la clave en localStorage 
                $('#' + id + '.like').removeClass("active");
                $('#' + id + '.dislike').removeClass("active");
                $(this).addClass("active");
                localStorage.removeItem('likesuperhero' + id);
                localStorage.removeItem('dislikesuperhero' + id);
                localStorage.setItem($(this).attr('class').split(' ')[0] + 'superhero' + $(this).attr('id'), 1);
            }
        },
        error: function(){
            console.log(error)
        }
    });
})
})