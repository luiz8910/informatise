<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Banner</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><a href="{{ route('banner.index') }}"> Banners</a></li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Banner
                        <span class="panel-subtitle">Edição dos banners do site</span>
                    </div>
                    @if($edit)
                        <form action="{{ route('banner.update', ['id' => $banner->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @method('PUT')
                            @else
                                <form action="{{ route('banner.store') }}" method="POST" id="form" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                                    @endif
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Ativo</label>
                                        <div class="col-sm-6 xs-pt-5">
                                            <div class="switch-button switch-button-success">
                                                <input type="checkbox" checked="" name="active" id="active"><span>
                                                <label for="active"></label></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="order">Ordenação</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="order" name="order"
                                                   placeholder="Digite aqui qual a ordem de exibição no site"
                                                   value="@if($edit){{ $banner->order }}@else{{ $next_order }}@endif"
                                                   class="form-control number" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="title">Título</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="title" name="title"
                                                   placeholder="Digite aqui qual o título do banner"
                                                   value="@if($edit){{ $banner->title }}@endif"
                                                   class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3  control-label" for="subtitle">Subtítulo</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" id="subtitle" name="subtitle"
                                                   placeholder="Digite aqui qual o subtítulo do banner"
                                                   value="@if($edit){{ $banner->subtitle }}@endif"
                                                   class="form-control" >
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label" for="editor1" style="margin-right: -27px;">Texto</label>
                                    <div class="col-md-6 div_editor">

                                            <div class="panel-body">
                                                <textarea name="text" id="editor1">{{ $banner->text }}</textarea>
                                            </div>

                                    </div>


                                    <div class="form-group">


<!--                                        <label class="col-sm-3 control-label" for="text">Texto do Banner</label>
                                        <div class="col-sm-4">

                                            <textarea class="form-control" name="text" placeholder="Digite o texto do banner"
                                                      id="text" cols="30" rows="10">@if($edit){{ $banner->text }}@endif</textarea>
                                        </div>-->
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="file" id="file" style="display:none;">
                                            <button class="btn btn-primary" id="upload" onclick="upload_view();" style="margin-bottom: 10px;">
                                                <i class="mdi mdi-cloud-upload"></i>
                                                Enviar Banner
                                            </button>

                                            <br>

                                            <img id="preview_img" class="img-preview" src="@if($edit){{ str_replace('public', '/storage', $banner->picture) }}@endif">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-7">
                                            @if(!$edit)
                                                <button type="button" class="btn btn-rounded btn-space btn-primary btn-lg" onclick="save();">
                                                    <i class="icon icon-left mdi mdi-plus"></i>
                                                    Salvar e Adicionar outro banner
                                                </button>
                                            @endif
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
