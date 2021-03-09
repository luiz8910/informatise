$(function (){


});

function reorder_menu()
{
    var order = $("#out2").text();

    console.log(order);

    $.ajax({
        url: '/menu',
        method: 'POST',
        data: {'order': order},
        dataType: 'json',
        success: function (e){
            if(e.status)
                sweet_alert_success('Alterações efetuadas');

            else
                sweet_alert_error(e.msg);
        },
        fail: function (e) {
            console.log('fail', e);
            sweet_alert_error();
        }
    });
}
