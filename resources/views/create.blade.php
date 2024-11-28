@extends('master')


@section('content')


<div class="modal-body">
  <div class="container-fluid">
  <h2>Adicione uma construção</h2>
    
  <form action="/constructions/store" method="GET">
        @csrf

        <h3>Nome da obra:</h3>
        <div class="input-group mb-3">
            <input type="text" name="nome" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Data de finalização:</h3>
        <div class="input-group mb-3">
            <input type="date" name="data_de_finalizacao" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Progresso da obra:</h3>
        <div class="input-group mb-3">
            <select class="form-select" name="andamento_da_obra" aria-label="Example select with button addon">
                <option value="pendente" id="pendente">Pendente</option>
                <option value="andamento" id="andamento">Em andamento</option>
                <option value="finalizada" id="finalizada">Finalizada</option>
            </select>
        </div>

        <h3>Relatório da obra:</h3>
        <div class="input-group mb-3">
            <input type="text" name="relatorio_da_obra" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Solicitação de materiais(Opcional):</h3>
        <div class="input-group mb-3">
            <input type="text" name="solicitacao_de_materiais" class="form-control" aria-label="Text input with dropdown button">
        </div>


        <button type="submit" class="btn btn-success">Adicionar</button>
        <a href="{{route('ConstructionControllerIndex')}}" class="btn btn-danger">Cancelar</a>

    </form>
    
    
  </div>
</div>

@endsection