@extends('master')


@section('content')


<div class="modal-body">
  <div class="container-fluid">
  <h2>Adicione uma construção</h2>
    
  <form action="{{ Route('ConstructionController.create')}}" method="POST">
        @csrf

        <h3>Nome da obra:</h3>
        <div class="input-group mb-3">
            <input type="text" name="nome" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Data de finalização:</h3>
        <div class="input-group mb-3">
            <input type="text" name="data_de_finalizacao" class="form-control" aria-label="Text input with dropdown button">
        </div>

        <h3>Progresso da obra:</h3>
        <div class="input-group mb-3">
            <select class="form-select" name="andamento_da_obra" aria-label="Example select with button addon">
                <option value="1" id="pendente">Pendente</option>
                <option value="2" id="andamento">Em andamento</option>
                <option value="3" id="finalizada">Finalizada</option>
            </select>
        </div>

        <h3>Solicitação de materiais(Opcional):</h3>
        <div class="input-group mb-3">
            <input type="text" name="solicitacao_de_materiais" class="form-control" aria-label="Text input with dropdown button">
        </div>


        <button type="button" class="btn btn-success">Adicionar</button>
        <button type="button" class="btn btn-danger">Cancelar</button>

    </form>
    
    
  </div>
</div>

@endsection