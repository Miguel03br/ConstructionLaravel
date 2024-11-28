@extends('master')


@section('content')

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<title>Bootstrap Example</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal-body">
  <div class="container-fluid">
  <h2>Adicione uma construção</h2>
    
  <form action="{{route('ConstructionControllerUpdate', $Construction->id)}}" method="POST">
        @csrf
        @method('PUT')
        <h3>Nome da obra:</h3>
        <div class="input-group mb-3">
            <input type="text" name="nome" value="{{$Construction->nome}}" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Data de finalização:</h3>
        <div class="input-group mb-3">
            <input type="date" name="data_de_finalizacao" value="{{$Construction->data_de_finalizacao}}" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Progresso da obra:</h3>
        <div class="input-group mb-3">
            <select class="form-select" name="andamento_da_obra" value="{{$Construction->andamento_da_obra}}" aria-label="Example select with button addon">
                <option value="1" id="pendente">Pendente</option>
                <option value="2" id="andamento">Em andamento</option>
                <option value="3" id="finalizada">Finalizada</option>
            </select>
        </div>

        <h3>Relatório da obra:</h3>
        <div class="input-group mb-3">
            <input type="text" name="relatorio_da_obra" value="{{$Construction->relatorio_da_obra}}"  class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Solicitação de materiais(Opcional):</h3>
        <div class="input-group mb-3">
            <input type="text" name="solicitacao_de_materiais" value="{{$Construction->solicitacao_de_materiais}}" class="form-control" aria-label="Text input with dropdown button">
        </div>


        <button type="submit" class="btn btn-success">Adicionar</button>
        <button type="button" class="btn btn-danger">Cancelar</button>

        @if ($errors->has('comment'))
            <div class="text-danger">{{$errors->first('comment')}}</div>
        @endif

    </form>
    
    
  </div>
</div>

@endsection

