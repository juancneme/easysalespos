function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if ($(window).scrollTop() != scroll_to) {
        $('html, body').stop().animate({
            scrollTop: scroll_to
        }, 0);
    }
}

function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if (direction == 'right') {
        new_value = now_value + (100 / number_of_steps);
    } else if (direction == 'left') {
        new_value = now_value - (100 / number_of_steps);
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}


function copy_address() {
    document.getElementById('f1-typeDocStore').value = document.getElementById('f1-typeDoc').value;
    document.getElementById('f1-numberDocumentStore').value = document.getElementById('f1-numberDocument').value;
    document.getElementById('f1-phonet').value = document.getElementById('f1-phone').value;
    document.getElementById('f1-emailt').value = document.getElementById('f1-email').value;
}


$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});


jQuery(document).ready(function () {

    /*
        Fullscreen background
    */
    /*$.backstretch("http://lorempixel.com/1920/1280/");*/
    /*$.backstretch("newstore_template/assets/img/bck1.jpg");*/

    //Para hacerla rotativas
    //imagenes = ['01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg','07.jpg','08.jpg','09.jpg','10.jpg','11.jpg'];
    //$.backstretch('newstore_template/assets/img/tree-1754051_1920.jpg');


    $('#top-navbar-1').on('shown.bs.collapse', function () {
        $.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function () {
        $.backstretch("resize");
    });

    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');

    $('.f1 input[type="text"], .f1 input[type="password"], .f1 input[type="email"], .f1 input[type="number"], .f1 textarea').on('focus', function () {
        $(this).removeClass('input-error');
    });

    // next step
    $('.f1 .btn-next').on('click', function () {
        var count = 0;
        var aux_field = 0;
        var parent_fieldset = $(this).parents('fieldset');
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');
        var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        // fields validation contador
        aux_field = parent_fieldset.find('input[type="text"], input[type="password"], input[type="number"],input[type="email"],select,input, textarea').length;
        // fields validation
        parent_fieldset.find('input[type="text"], input[type="password"], input[type="number"],input[type="email"], select,input, textarea').each(function () {

            // aca omite la validaciónm para los campos que son de documentos ya que tienen campos hidden y eso son diferentyes
            if ($(this).attr('id') == "id_file" || $(this).attr('id') == "upload_file" || $(this).attr('id') == "hidden_upload_file") {
                count = 6;
            } else {
                if ($(this).val() != null) {
                    if ($(this).val() != "") {
                        $(this).removeClass('input-error');
                        count++;// cuenta cuantos estan llenos
                        //console.log("LLENO, OK");
                    } else {
                        $(this).addClass('input-error');

                        //console.log("VACIO, NO PASA");
                    }
                }
            }

        });
        // console.log(count);
        // console.log(aux_field);


        //Validación para los select
        parent_fieldset.find('select').each(function () {
            if ($(this).attr('id') != 'id_file') {
                if ($(this).val() != null) {
                    $(this).removeClass('input-error');
                    //console.log("Correo validado");
                } else {
                    $(this).addClass('input-error');
                    count--;// si no es correcto quita un contador
                    //console.log("La dirección de correo no es válida");
                }
            }
        });

        //Validación para los correos
        parent_fieldset.find('input[type="email"]').each(function () {
            if (regex.test($('input[type="email"]').val().trim())) {
                $(this).removeClass('input-error');
                //console.log("Correo validado");
            } else {
                $(this).addClass('input-error');
                count--;// si no es correcto quita un contador
                //console.log("La dirección de correo no es válida");
            }
        });

        parent_fieldset.find('#f1-emailt').each(function () {
            if (regex.test($('#f1-emailt').val().trim())) {
                $(this).removeClass('input-error');
                //console.log("Correo validado");
            } else {
                $(this).addClass('input-error');
                count--;// si no es correcto quita un contador
                //console.log("La dirección de correo no es válida");
            }
        });

        // fields validation
        //Si la cantidad de campos en la pantalla coincide con la cantidad llena  entra
        if (aux_field === count) {
            parent_fieldset.fadeOut(400, function () {
                // change icons
                current_active_step.removeClass('active').addClass('activated').next().addClass('active');
                // progress bar
                bar_progress(progress_line, 'right');
                // show next step
                $(this).next().fadeIn();
                // scroll window to beginning of the form
                scroll_to_class($('.f1'), 20);
            });
        }

    });

    // previous step
    $('.f1 .btn-previous').on('click', function () {
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');

        $(this).parents('fieldset').fadeOut(400, function () {
            // change icons
            current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
            // progress bar
            bar_progress(progress_line, 'left');
            // show previous step
            $(this).prev().fadeIn();
            // scroll window to beginning of the form
            scroll_to_class($('.f1'), 20);
        });
    });

    // submit
    $('.f1').on('submit', function (e) {

        // fields validation
        $(this).find('input[type="text"], input[type="password"], input[type="number"], input[type="email"], textarea').each(function () {
            if ($(this).val() == "") {
                e.preventDefault();
                $(this).addClass('input-error');
            } else {
                $(this).removeClass('input-error');
            }
        });
        // fields validation

    });
});




                    
