<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Usuarios</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:37%;">Nome Usuario</th>
                                <th style="width:36%;">Cargo</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($people as $person)
                                <tr id="model_{{ $person->id }}">
                                    <td class="user-avatar"> <img src="assets/img/avatar6.png" alt="Avatar">
                                        <a href="{{ route('person.edit', ['id' => $person->id]) }}" style="color:#0b0b0b;"> {{ $person->name }}</a>
                                    </td>
                                    <td>Admin</td>
                                    <td>
                                        @if($person->status)
                                            <span class="label label-success">Disponivel</span>

                                        @else
                                            <span class="label label-danger">Bloqueado</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('person.edit', ['id' => $person->id]) }}" class="icon"><i class="mdi mdi-edit"></i></a>
                                        <a href="javascript:" onclick="activate({!! $person->id !!})" class="icon"><i class="mdi mdi-long-arrow-up" style="margin-left: 10px;"></i></a>
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
