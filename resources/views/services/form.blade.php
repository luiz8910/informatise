<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Serviços</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><a href="{{ route('services.index') }}"> Serviços</a></li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Serviços
                        <span class="panel-subtitle">Edição dos Serviços do site</span>
                    </div>
                    @if($edit)
                        <form action="{{ route('services.update', ['id' => $service->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @method('PUT')
                            @else
                                <form action="{{ route('services.store') }}" method="POST" id="form" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                                    @endif
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ativo</label>
                                        <div class="col-sm-6 xs-pt-5">
                                            <div class="switch-button switch-button-success">
                                                <input type="checkbox" @if($edit && $service->active) checked @elseif(!$edit) checked @endif name="active" id="active"><span>
                                                <label for="active"></label></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="order">Ordenação</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="order" name="order"
                                                   placeholder="Digite aqui qual a ordem de exibição no site"
                                                   value="@if($edit){{ $service->order }}@else{{ $next_order }}@endif"
                                                   class="form-control number" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">Nome</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="name" name="name"
                                                   placeholder="Digite aqui qual o nome do serviço"
                                                   value="@if($edit){{ $service->name }}@endif"
                                                   class="form-control" >
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label" for="editor1" style="margin-right: -27px;">Texto</label>
                                    <div class="col-md-6 div_editor">

                                        <div class="panel-body">
                                            <textarea name="text" id="editor1">@if($edit){{ $service->text }}@endif</textarea>
                                        </div>

                                    </div>


                                    <div class="form-group">


                                    <!--                                        <label class="col-sm-3 control-label" for="text">Texto do service</label>
                                        <div class="col-sm-4">

                                            <textarea class="form-control" name="text" placeholder="Digite o texto do service"
                                                      id="text" cols="30" rows="10">@if($edit){{ $service->text }}@endif</textarea>
                                        </div>-->
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="file" id="file" style="display:none;">
                                            <button class="btn btn-primary" id="upload" onclick="upload_view();" style="margin-bottom: 10px;">
                                                <i class="mdi mdi-cloud-upload"></i>
                                                Enviar Imagem
                                            </button>

                                            <br>

                                            <img id="preview_img" class="img-preview" src="@if($edit){{ str_replace('public', '/storage', $service->picture) }}@endif">
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
