<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <br><br>
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Contatos</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:15%">Nome</th>
                                <th style="width:10%;">Email</th>
                                <th style="width:10%;">Telefone</th>
                                <th style="width:10%;">Data do contato</th>
                                <th style="width:36%;">Mensagem</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $c)
                                <tr id="model_{{ $c->id }}">
                                    <td class="user-avatar">
                                        {{ $c->name }}
                                    </td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->phone }}</td>
                                    <td>{{ date_format(date_create($c->created_at), 'd/m/Y H:i') }}</td>
                                    <td><?php echo html_entity_decode($c->message, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="actions">
                                        <a href="https://api.whatsapp.com/send?phone={{ $c->phone }}" target="_blank" class="icon" title="Enviar mensagem no Whatsapp">
                                            <i class="mdi mdi-whatsapp custom-icon" style="color:#36b321;"></i>
                                        </a>
                                        <a href="mailto:{{ $c->email }}" class="icon" style="margin-left: 15px; color: #60aae4;" title="Enviar Email">
                                            <i class="mdi mdi-email custom-icon"></i>
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
