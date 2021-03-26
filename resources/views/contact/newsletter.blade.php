<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <br><br>
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Newsletter</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:25%">Nome</th>
                                <th style="width:25%;">Email</th>
                                <th style="width:30%;">Data do contato</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $n)
                                <tr id="model_{{ $n->id }}">
                                    <td class="user-avatar">
                                        {{ $n->name }}
                                    </td>
                                    <td>{{ $n->email }}</td>
                                    <td>{{ date_format(date_create($n->created_at), 'd/m/Y H:i') }}</td>
                                    <td class="actions">
                                        <a href="mailto:{{ $n->email }}" class="icon" style="margin-left: 15px; color: #60aae4;" title="Enviar Email">
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
