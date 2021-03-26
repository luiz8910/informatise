<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Quem Somos</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashbord</a></li>
            <li class="active">Quem Somos</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Quem Somos
                        <span class="panel-subtitle">Edição da parte quem somos do site</span>
                    </div>
                    <form action="{{ route('about.update') }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Imagem</label>
                            <div class="col-sm-7">
                                <input type="file" name="file" id="file" style="display:none;">
                                <button class="btn btn-primary" id="upload" onclick="upload_view();">
                                    <i class="mdi mdi-cloud-upload"></i>
                                    Enviar Imagem
                                </button>

                                <img id="preview_img" class="img-preview" src="@if($about->picture){{ str_replace('public', '/storage', $about->picture) }}@endif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Titulo</label>
                            <div class="col-sm-7">
                                <input type="text" placeholder="{{ env('APP_NAME') }}" class="form-control"
                                       value="{{ $about->title }}" name="title" id="title">
                            </div>
                        </div><br/><br/><br/>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Quem Somos</label>
                            <div class="col-sm-7">
                                <textarea id="about" name="about">{{ $about->about }}</textarea>
                            </div>
                        </div><br/><br/><br/>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nossa Missão</label>
                            <div class="col-sm-7">
                                <textarea id="our_mission" name="our_mission">{{ $about->our_mission }}</textarea>
                            </div>
                        </div><br/><br/><br/><br/><br/><br/>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-rounded btn-space btn-success btn-lg">
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
