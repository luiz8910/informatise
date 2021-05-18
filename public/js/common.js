$(function (){

    $(".radio_active").click(function (){

        var id = $(this)[0].id;

        if(id == "rad_inactive")
            $("#rad_active").prop('checked', false);

        else
            $("#rad_inactive").prop('checked', false);


    });

    $("#file").change(function (){
        preview_file($(this));
    });

    //Used to limit user typing to numbers
    //Limita o usuário a digitar apenas números
    $(".number").keypress(function (e) {
        if (e.which < 48 || e.which > 57)
            return false;

    });

    $("#email").change(function (){
        if(!validateEmail($(this).val()))
        {
            sweet_alert_error('Digite um email válido');

            $(this).val('');
        }
    });

    call_sleep();

});

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function call_sleep() {
    console.log('Taking a break...');
    await sleep(2000);
    console.log('Two seconds later, showing sleep in a loop...');

    // Sleep in loop
    /*for (let i = 0; i < 5; i++) {
        if (i === 3)
            await sleep(2000);
        console.log(i);
    }*/

    fix_brand_bug();
}


function validateEmail($email)
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test($email);
}

function fix_brand_bug()
{
    $("#all").trigger('click');
}

function sweet_alert_error($msg, $timer) {
    var msg = $msg ? $msg : 'Um erro desconhecido ocorreu, tente novamente mais tarde';

    swal(msg, {
        icon: 'error',
        timer: $timer ? $timer : 3000
    });
}

function sweet_alert_success($msg, $timer) {
    var msg = $msg ? $msg : 'Sucesso';

    swal(msg, {
        icon: 'success',
        timer: $timer ? $timer : 3000
    });
}

function validateEmail($email)
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test($email);
}

function logout()
{
    $("#logout").submit();
}

function resize_options_buttons()
{
    $(".btn-inactive").css('display', 'inline-block');

    $(".form-options")
        .css('width', '300px')
        .css('margin-left', '79%')
        .css('float', 'left');

}

//Generic Ajax Request / Requisição ajax genérica
function sweet_alert($data, $ajax) {
    swal({
        title: $data.title,
        text: $data.text,
        icon: $data.icon ? $data.icon : "warning",
        buttons: {
            cancel: {
                text: $data.cancel ? $data.cancel : "Cancelar",
                value: null,
                visible: true,
                closeModal: true,
            },
            confirm: {
                text: $data.button ? $data.button : "OK",
                value: true,
                visible: true,
                closeModal: true
            }
        }

    }).then((value) => {
        if (value) {
            var request = $.ajax({
                url: $ajax.url,
                method: $ajax.method ? $ajax.method : 'GET',
                dataType: 'json'

            });

            request.done(function (e) {
                if (e.status) {

                    sweet_alert_success($data.success_msg);

                    setTimeout(function () {
                        if ($data.reload)
                            location.reload();
                        else
                            $("#model_" + $data.id).remove();
                    }, 3000);
                } else {
                    sweet_alert_error();

                    return false;
                }
            });

            request.fail(function (e) {
                console.log('fail');
                console.log(e);
                sweet_alert_error();

                return false;
            })

        }

        return false;
    });

}

function preview_file(input)
{
    var file = $("#file").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#preview_img").attr("src", reader.result).css('display', 'block');
            $("#upload").text('Trocar Imagem');

        }

        reader.readAsDataURL(file);
    }
}

function upload_view()
{
    event.preventDefault();
    $("#file").trigger('click');
}

function getWidth() {
    if (self.innerWidth) {
        return self.innerWidth;
    }

    if (document.documentElement && document.documentElement.clientWidth) {
        return document.documentElement.clientWidth;
    }

    if (document.body) {
        return document.body.clientWidth;
    }
}

function getHeight() {
    if (self.innerHeight) {
        return self.innerHeight;
    }

    if (document.documentElement && document.documentElement.clientHeight) {
        return document.documentElement.clientHeight;
    }

    if (document.body) {
        return document.body.clientHeight;
    }
}

function isMobile()
{

    if(getWidth() < 576)
    {
        var width = getWidth() / 2;

        $(".logomarca")
            .css('margin-left', '20px')
            .css('width', width + 'px');

        $('.logo_site')
            .css('margin-left', '80px')
            .css('width', '60px');

        $('.social-link')
            .css('float', 'left');

        $('.top-left')
            .css('display', 'none');

        $('#text-login')
            .css('float', 'left')
            .css('width', '0px');

        $('.title').css('font-size','13px')

        if(getWidth() > 400)
            $('#text-login')
                .css('margin-left', '30px');
    }
}

function add_model($model)
{
    location.href = '/' + $model;
}
