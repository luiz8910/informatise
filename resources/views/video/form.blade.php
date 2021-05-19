<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Vídeo</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><a href="javascript:">Vídeo</a></li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Vídeo
                        <span class="panel-subtitle">Edição do vídeo do site</span>
                    </div>

                        <form action="{{ route('video.update') }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-1 control-label">Ativo</label>
                                        <div class="col-sm-6 xs-pt-5">
                                            <div class="switch-button switch-button-success">
                                                <input type="checkbox" @if($video->active) checked @endif name="active" id="active"><span>
                                                <label for="active"></label></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-1 control-label" for="url">Link do Vídeo</label>
                                        <div class="col-sm-7">
                                            <input type="text" id="url" name="url"
                                                   placeholder="Digite aqui qual a url de exibição no site"
                                                   value="{{ $video->url }}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-sm-1">
                                            <i class="fas fa-external-link-alt" title="Reproduzir video em nova aba"
                                               style="font-size: 40px; cursor:pointer;" onclick="open_video();"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-1 control-label" for="title">Título</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="title" name="title"
                                                   placeholder="Digite aqui qual o título do video"
                                                   value="{{ $video->title }}"
                                                   class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-1 control-label" for="subtitle">Subtítulo</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" id="subtitle" name="subtitle"
                                                   placeholder="Digite aqui qual o subtítulo do video"
                                                   value="{{ $video->subtitle }}"
                                                   class="form-control" >
                                        </div>
                                    </div>


                                    <label class="col-sm-3 control-label" for="editor1" style="margin-right: -27px;">Texto</label>
                                    <div class="col-md-6 div_editor">

                                        <div class="panel-body">
                                            <textarea name="text" id="editor1">{{ $video->text }}</textarea>
                                        </div>

                                    </div>

                                    <div class="form-group"></div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-7">
                                            <input type="file" name="file" id="file" style="display:none;">
                                            <button class="btn btn-primary" id="upload" onclick="upload_view();" style="margin-bottom: 10px;">
                                                <i class="mdi mdi-cloud-upload"></i>
                                                Imagem do Vídeo (Thumbnail)
                                            </button>

                                            <br>

                                            <img id="preview_img" class="img-preview"
                                                 src="{{ str_replace('public', '/storage', $video->thumbnail) }}">
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
