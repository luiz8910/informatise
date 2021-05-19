<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('services.create') }}" class="btn btn-primary" style="margin-bottom: 30px;">
                    <i class="mdi mdi-plus"></i>
                    Novo Serviço
                </a>
                <a href="{{ route('services.index', ['filter' => 'inactive']) }}" @if($inactives == 0) disabled @endif class="btn btn-danger" style="margin-bottom: 30px;">
                    <i class="fas fa-trash"></i>
                    Incluir Inativos na lista
                </a>
            </div>
            <br><br>
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Serviços</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:15%">Imagem</th>
                                <th style="width:10%;">Ordem</th>
                                <th style="width: 10%;">Nome</th>
                                <th style="width: 20%;">Texto</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $s)
                                <tr id="model_{{ $s->id }}" @if(!$s->active) style="background-color: #efaeae;" @endif>
                                    <td class="user-avatar">
                                        <a href="{{ route('services.edit', ['id' => $s->id]) }}" style="color: #0b0b0b;">
                                            <img src="{{ str_replace('public', '/storage', $s->picture) }}" alt="Avatar" style="width: 100px !important; height: 100px !important;">
                                        </a>
                                    </td>
                                    <td>{{ $s->order . 'º'}}</td>

                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->text }}</td>
                                    <td>@if($s->active) Ativo @else <span style="color:red; font-size: 20px;">Inativo</span> @endif</td>

                                    <td class="actions">
                                        <a href="{{ route('services.edit', ['id' => $s->id]) }}" class="icon">
                                            <i class="mdi mdi-edit custom-icon" @if(!$s->active) style="color: #0b0b0b; @endif"></i>
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
