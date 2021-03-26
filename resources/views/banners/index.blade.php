<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('banner.create') }}" class="btn btn-primary" style="margin-bottom: 30px;">
                    <i class="mdi mdi-plus"></i>
                    Novo Banner
                </a>
            </div>
            <br><br>
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Banners</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:25%">Imagem</th>
                                <th style="width:10%;">Ordem</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banner as $b)
                                <tr id="model_{{ $b->id }}">
                                    <td class="user-avatar">
                                        <a href="{{ route('banner.edit', ['id' => $b->id]) }}" style="color: #0b0b0b;">
                                            <img src="{{ str_replace('public', '/storage', $b->picture) }}" alt="Avatar" style="width: 100px !important; height: 100px !important;">
                                        </a>
                                    </td>
                                    <td>{{ $b->order . 'º'}}</td>

                                    <td class="actions">
                                        <a href="{{ route('banner.edit', ['id' => $b->id]) }}" class="icon">
                                            <i class="mdi mdi-edit custom-icon"></i>
                                        </a>
                                        <a href="javascript:" class="icon" style="margin-left: 15px;" onclick="destroy({!! $b->id !!})">
                                            <i class="mdi mdi-delete custom-icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
