<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Categorias</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><a href="{{ route('categories.index') }}"> Categorias</a></li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Categorias
                        <span class="panel-subtitle">Edição das Categorias do site</span>
                    </div>
                    @if($edit)
                        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @method('PUT')
                            @else
                                <form action="{{ route('categories.store') }}" method="POST" id="form" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                                    @endif
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ativo</label>
                                        <div class="col-sm-6 xs-pt-5">
                                            <div class="switch-button switch-button-success">
                                                <input type="checkbox" @if($edit && $category->active) checked @elseif(!$edit) checked @endif name="active" id="active"><span>
                                                <label for="active"></label></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="order">Ordenação</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="order" name="order"
                                                   placeholder="Digite aqui qual a ordem de exibição no site"
                                                   value="@if($edit){{ $category->order }}@else{{ $next_order }}@endif"
                                                   class="form-control number" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="title">Título</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="title" name="title"
                                                   placeholder="Digite aqui qual o título da categoria"
                                                   value="@if($edit){{ $category->title }}@endif"
                                                   class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="text">Texto</label>
                                        <div class="col-sm-8">
                                            <textarea id="text" name="text"
                                                   placeholder="Digite aqui qual o texto da categoria" rows="10"
                                                      class="form-control" >@if($edit){{ $category->text }}@endif</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Escolher Ícone</label>
                                        <div class="col-sm-7">

                                            <!-- Button trigger modal-->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSocial">Escolher</button>

                                            <br>

                                            <img id="preview_img" class="img-preview" src="@if($edit){{ str_replace('public', '/storage', $category->icon) }}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-7">
                                            <button type="submit" class="btn btn-rounded btn-space btn-success btn-lg" id="btn_submit">
                                                <i class="icon icon-left mdi mdi-check"></i>
                                                Salvar
                                            </button>
                                        </div>
                                    </div>

                                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Modal: modalSocial-->
<div class="modal fade" id="modalSocial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>

            <!--Body-->
            <div class="modal-body mb-0 text-center">

                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-phone"></i></button>
                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-tablet"></i></button>
                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-print"></i></button>
                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-cog"></i></button>
                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-laptop"></i></button>
                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-desktop"></i></button>
                <button type="button" class="btn btn-default icon-custom"><i class="fas fa-headphones"></i></button>


            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: modalSocial-->
