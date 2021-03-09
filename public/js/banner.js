$(function (){


});

function save()
{
    var action = $("#form").attr('action');

    if(action.search('/banner/1') != -1)

        $("#btn_submit").trigger('click');

    else{
        $("#form").attr('action', action + '/1');

        $("#btn_submit").trigger('click');
    }

}

function destroy($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir este banner?',
        button: 'Excluir',
        success_msg: 'O banner foi excluído com sucesso',
        reload: true,
        id: $id
    };


    var ajax = {
        url: '/banner/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}
