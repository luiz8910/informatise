$(function (){

    $("#btn_submit").click(function (){
        if(location.pathname.search('criar') != -1) {
            $(this).css('display', 'none');
            $("#btn_cancel").css('display', 'none');
            $(".progress").css('display', 'block');
        }
    });
});

function destroy($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir este usuário?',
        button: 'Excluir',
        reload: false,
        success_msg: 'Este usuário foi excluído com sucesso',
        id: $id
    };

    var ajax = {
        url: '/usuario/' + $id,
        method: 'DELETE'
    };

    sweet_alert(data, ajax);
}

function activate($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja reativar este usuário?',
        button: 'Ativar',
        reload: false,
        success_msg: 'Este usuário foi reativado com sucesso',
        id: $id
    };

    var ajax = {
        url: '/activate_user/' + $id,
    };

    sweet_alert(data, ajax);
}
