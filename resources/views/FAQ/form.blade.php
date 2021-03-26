<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">FAQ</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active">FAQ</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        FAQ
                        <span class="panel-subtitle">Edição da parte quem somos do site</span>
                    </div>
                    @if($edit)
                        <form action="{{ route('faq.update', ['id' => $faq->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                        @method('PUT')
                    @else
                        <form action="{{ route('faq.store') }}" method="POST" id="form" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                    @endif

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="order">Ordenação</label>
                            <div class="col-sm-4">
                                <input type="text" id="order" name="order"
                                       placeholder="Digite aqui qual a ordem de exibição no site"
                                       value="@if($edit){{ $faq->order }}@else{{ $next_order }}@endif"
                                       class="form-control number" required>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-3 control-label" for="question">Pergunta</label>
                            <div class="col-sm-4">
                                <input type="text" id="question" name="question" value="@if($edit){{ $faq->question }}@else{{ old('question') }}@endif"
                                       placeholder="Digite aqui sua pergunta" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Digite aqui a Resposta</label>
                            <div class="col-sm-7">
                                <textarea id="answer" name="answer">@if($edit){{ $faq->answer }}@endif</textarea>
                            </div>
                        </div><br/><br/><br/>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-7">
                                @if(!$edit)
                                <button type="button" class="btn btn-rounded btn-space btn-primary btn-lg" onclick="save();">
                                    <i class="icon icon-left mdi mdi-plus"></i>
                                    Salvar e Adicionar outra
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
