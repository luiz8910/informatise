<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('faq.create') }}" class="btn btn-primary" style="margin-bottom: 30px;">
                    <i class="mdi mdi-plus"></i>
                    Nova Pergunta
                </a>
            </div>
            <br><br>
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">FAQ</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:25%">Pergunta</th>
                                <th style="width:10%;">Ordem</th>
                                <th style="width:36%;">Resposta</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($faq as $f)
                                    <tr id="model_{{ $f->id }}">
                                        <td class="user-avatar"><a href="{{ route('faq.edit', ['id' => $f->id]) }}" style="color: #0b0b0b;">
                                                {{ $f->question }}
                                            </a>
                                        </td>
                                        <td>{{ $f->order . 'º'}}</td>
                                        <td><?php echo html_entity_decode($f->answer, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="actions">
                                            <a href="{{ route('faq.edit', ['id' => $f->id]) }}" class="icon">
                                                <i class="mdi mdi-edit custom-icon"></i>
                                            </a>
                                            <a href="javascript:" class="icon" style="margin-left: 15px;" onclick="destroy({!! $f->id !!})">
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
