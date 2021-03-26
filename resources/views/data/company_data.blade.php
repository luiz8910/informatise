<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Redes Sociais</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Informações</a></li>
            <li class="active">Redes Sociais</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Redes Sociais e etc.
                        <span class="panel-subtitle">Dados do site </span>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.data.update') }}" method="POST"
                              style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Logotipo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="file" id="file" style="display:none;">
                                    <button class="btn btn-primary" id="upload" onclick="upload_view();">
                                        <i class="mdi mdi-cloud-upload"></i>
                                        Enviar Imagem
                                    </button>

                                    <img id="preview_img" class="img-preview" src="@if($data->picture){{ str_replace('public', '/storage', $data->picture) }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Horário de Funcionamento</label>
                                <div class="col-sm-7">
                                    <textarea id="opening_hours" name="opening_hours" class="form-control">{{ $data->opening_hours }}</textarea>
                                </div>
                            </div><br/><br/><br/>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Endereço</label>
                                <div class="col-sm-7">
                                    <textarea id="address" name="address" placeholder="Digite aqui o endereço da sua empresa" class="form-control">{{ $data->address }}</textarea>
                                </div>
                            </div><br/><br/><br/>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Facebook</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Link" id="facebook" name="facebook" class="form-control" value="{{ $data->facebook }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">WhatsApp</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Número de telefone" value="{{ $data->whatsapp }}" class="form-control phone" id="whatsapp" name="whatsapp">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Instagram</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Link" id="instagram" name="instagram" class="form-control" value="{{ $data->instagram }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Skype</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Link" class="form-control" id="skype" name="skype" value="{{ $data->skype }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Messenger</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Link" class="form-control" name="messenger" id="messenger" value="{{ $data->messenger }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email do responsável</label>
                                <div class="col-sm-7">
                                    <input type="text" id="email" name="email" placeholder="Email que vai receber as mensagens do site" value="{{ $data->email }}" class="form-control">
                                </div>
                            </div>

                            <br><br><br>
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
</div>
