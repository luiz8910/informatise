$(function (){

    $(".radio_active").attr('disabled', false);


    $("#form").submit(function (e){
        if($(".radio").is(':checked').length == 0)
        {
            e.preventDefault();

            sweet_alert_error('Escolha uma categoria para continuar');
        }
    });


    $(".radio").click(function (){

        var id = this.id.replace('rad_', '');

        $("#category_id").val(id);

        for (var i = 0; i < $(".radio").length; i++)
        {
            var _id = $(".radio")[i].id;

            $("#"+_id).prop('checked', false);
        }

        $("#rad_"+id).prop('checked', true);
    });


    $("#category_select").change(function (){

        if($(this).val() == 0)
            location.href = '/produtos';
        else
            location.href = "/produtos/"+$(this).val();
    });

    $("#category_select_sub").change(function (){

        if($(this).val() == 0)
            location.href = "/subcategorias_produtos"
        else
            location.href = "/subcategorias_produtos/"+$(this).val();
    });


});


function destroy($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir este produto?',
        button: 'Excluir',
        success_msg: 'O produto foi excluído com sucesso',
        reload: false,
        id: $id
    };


    var ajax = {
        url: '/produto/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function activate($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja reativar este produto?',
        button: 'Reativar',
        success_msg: 'O produto foi reativado com sucesso',
        reload: false,
        id: $id
    }

    var ajax = {
        url: '/activate/' + $id,
        method: 'GET',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function activate_category($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja reativar esta categoria?',
        button: 'Reativar',
        success_msg: 'A categoria foi reativada com sucesso',
        reload: false,
        id: $id
    }

    var ajax = {
        url: '/activate_category/' + $id,
        method: 'GET',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function activate_category_sub($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja reativar esta subcategoria?',
        button: 'Reativar',
        success_msg: 'A subcategoria foi reativada com sucesso',
        reload: false,
        id: $id
    }

    var ajax = {
        url: '/activate_subcategory/' + $id,
        method: 'GET',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function destroy_category($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir esta categoria?',
        button: 'Excluir',
        success_msg: 'A categoria foi excluída com sucesso',
        reload: false,
        id: $id
    };


    var ajax = {
        url: '/categoria/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}

function destroy_category_sub($id)
{
    var data = {
        title: 'Atenção',
        text: 'Você deseja excluir esta subcategoria?',
        button: 'Excluir',
        success_msg: 'A subcategoria foi excluída com sucesso',
        reload: false,
        id: $id
    };


    var ajax = {
        url: '/subcategoria/' + $id,
        method: 'DELETE',
        dataType: 'json'
    };

    sweet_alert(data, ajax);
}




