$(function (){

    $("#btn_submit").click(function (){

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();

        var stop = false;

        if(name == "")
        {
            $("#lbl_name").css('display', 'block');
            stop = true;
        }

        if(email == "")
        {
            $("#lbl_email").css('display', 'block');
            stop = true;
        }

        if(message == "")
        {
            $("#lbl_message").css('display', 'block');
            stop = true;
        }

        if(stop)
            return;

        $(".lbl").css('display', 'none');

        $("#btn_submit").css('display', 'none');

        $("#contact_form_message_box").css('display', 'block');

        $.ajax({
            url: '/contact',
            method: 'POST',
            dataType: 'json',
            data:{
                'name': name,
                'email': email,
                'phone': phone ?? '',
                'message': message
            },
            success: function (e){
                if(e.status)
                    sweet_alert_success('Sua mensagem foi enviada');

                else
                    sweet_alert_error();

            },
            fail: function (e){
                console.log('fail', e);
            }
        }).always(function (){
            $(".input_contact").val('');
            $("#btn_submit").css('display', 'block');
            $("#contact_form_message_box").css('display', 'none');
        });

    });
});

function send_newsletter()
{
    var name = $("#newsletter_name").val();
    var email = $("#newsletter_email").val();
    var stop = false;

    if(name == "")
    {
        stop = true;
        $("#newsletter_name").addClass('error');
    }

    if(email == "")
    {
        stop = true;
        $("#newsletter_email").addClass('error');
    }

    if(stop){
        sweet_alert_error('Preencha os campos indicados');
        return;
    }

    $("#btn_submit_newsletter").css('display', 'none');
    $("#loading_gif").css('display', 'inline-block');

    $(".subscrib_input").removeClass('error');

    $.ajax({
        url: '/newsletter',
        method: 'POST',
        dataType: 'json',
        data: {
            'name': name,
            'email': email
        },
        success: function (e){
            if(e.status) {
                $(".subscrib_input").val('');
                sweet_alert_success('Você está inscrito na newsletter');
            }else
                sweet_alert_error(e.msg);
        },
        fail: function (e){
            console.log('fail', e);
        }
    }).always(function (){
        $("#btn_submit_newsletter").css('display', 'inline-block');
        $("#loading_gif").css('display', 'none');
    });

}








