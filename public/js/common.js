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
    var file = $("input[type=file]").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#preview_img").attr("src", reader.result).css('display', 'block');
            $("#upload").text('Trocar Imagem');
            console.log($("#upload"));
        }

        reader.readAsDataURL(file);
    }
}

function upload_view()
{
    event.preventDefault();
    $("#file").trigger('click');
}
