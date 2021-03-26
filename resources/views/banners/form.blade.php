<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Banner</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Banner</li>
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

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="order">Ordenação</label>
                                        <div class="col-sm-4">
                                            <input type="text" id="order" name="order"
                                                   placeholder="Digite aqui qual a ordem de exibição no site"
                                                   value="@if($edit){{ $banner->order }}@else{{ $next_order }}@endif"
                                                   class="form-control number" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Upload</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="file" id="file" style="display:none;">
                                            <button class="btn btn-primary" id="upload" onclick="upload_view();">
                                                <i class="mdi mdi-cloud-upload"></i>
                                                Enviar Banner
                                            </button>

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
